<?php
require_once __DIR__ . '/config.php';
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { header('Location: login.php'); exit; }

$dataDir = __DIR__ . '/data';
$uploadsDir = __DIR__ . '/uploads';
if (!is_dir($dataDir)) { mkdir($dataDir, 0777, true); }
if (!is_dir($uploadsDir)) { mkdir($uploadsDir, 0777, true); }
$dataFile = $dataDir . '/projects.json';
$projects = [];
if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    $projects = json_decode($json, true) ?: [];
}

$id = isset($_GET['id']) ? (string)$_GET['id'] : '';
$editing = false;
$current = ['id'=>'','title'=>'','image'=>''];
if ($id !== '') {
    foreach ($projects as $p) {
        if ((string)($p['id'] ?? '') === $id) { $current = $p; $editing = true; break; }
    }
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    if ($title === '') { $error = 'Judul wajib diisi.'; }

    $imagePath = $current['image'] ?? '';
    if (!$error && isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $error = 'Upload gambar gagal.';
        } else {
            $size = $_FILES['image']['size'];
            if ($size > 10 * 1024 * 1024) { // 10MB
                $error = 'Ukuran gambar melebihi 10MB.';
            } else {
                $tmp = $_FILES['image']['tmp_name'];
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg','jpeg','png','gif','webp'];
                if (!in_array($ext, $allowed, true)) {
                    $error = 'Format gambar tidak didukung.';
                } else {
                    $newName = 'proj_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                    $dest = $uploadsDir . '/' . $newName;
                    if (!move_uploaded_file($tmp, $dest)) {
                        $error = 'Gagal menyimpan gambar.';
                    } else {
                        $imagePath = 'uploads/' . $newName;
                    }
                }
            }
        }
    }

    if (!$error) {
        if ($editing) {
            foreach ($projects as &$p) {
                if ((string)($p['id'] ?? '') === $id) { $p['title'] = $title; $p['image'] = $imagePath; break; }
            }
            unset($p);
            // Update ke MySQL
            $db = get_db_connection();
            $stmt = $db->prepare('UPDATE projects SET title = ?, image = ? WHERE id = ?');
            $pid = (int)$id;
            $stmt->bind_param('ssi', $title, $imagePath, $pid);
            $stmt->execute();
            $stmt->close();
            $db->close();
        } else {
            $newId = (string) (count($projects) > 0 ? (max(array_map(function($x){return (int)($x['id'] ?? 0);}, $projects)) + 1) : 1);
            $projects[] = ['id'=>$newId,'title'=>$title,'image'=>$imagePath];
            // Insert ke MySQL
            $db = get_db_connection();
            $stmt = $db->prepare('INSERT INTO projects (id, title, image) VALUES (?, ?, ?)');
            $nid = (int)$newId;
            $stmt->bind_param('iss', $nid, $title, $imagePath);
            $stmt->execute();
            $stmt->close();
            $db->close();
        }
        file_put_contents($dataFile, json_encode($projects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        header('Location: admin_projects.php');
        exit;
    }
}

$siteTitle = 'Ridha';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $siteTitle; ?> · <?php echo $editing ? 'Edit' : 'Tambah'; ?> Project</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#0b0c0f;--card:#12141a;--muted:#9aa3b2;--text:#e6e9ef;--brand:#7ee081}
        *{box-sizing:border-box}
        html,body{margin:0;padding:0;background:var(--bg);color:var(--text);font-family:'Inter',system-ui,Segoe UI,Roboto,Arial,sans-serif}
        a{text-decoration:none;color:inherit}
        .wrap{max-width:680px;margin:40px auto;padding:0 20px}
        .nav{display:flex;align-items:center;gap:16px}
        .nav .brand{font-weight:800;letter-spacing:.4px}
        .nav .links{margin-left:auto}
        .card{background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:12px;padding:16px}
        .form-group{display:flex;flex-direction:column;gap:6px;margin-bottom:12px}
        label{font-weight:600;font-size:13px;color:#cfd3db}
        input{background:#0f1116;border:1px solid rgba(255,255,255,.08);color:var(--text);border-radius:10px;padding:10px 12px;font-size:14px}
        .btn{background:var(--brand);color:#0b0c0f;padding:10px 14px;border-radius:10px;font-weight:700;font-size:14px;border:none;cursor:pointer}
        .btn.secondary{background:transparent;border:1px solid rgba(255,255,255,.12);color:var(--text)}
        .muted{color:var(--muted)}
        .alert{border-radius:10px;padding:10px 12px;margin:0 0 12px 0;font-size:14px}
        .alert.error{background:rgba(255,99,71,.12);border:1px solid rgba(255,99,71,.35);color:#ffb3a7}
    </style>
</head>
<body>
    <div class="wrap">
        <nav class="nav" aria-label="Admin">
            <div class="brand"><?php echo $editing ? 'Edit' : 'Tambah'; ?> Project</div>
            <div class="links"><a class="btn secondary" href="admin_projects.php">Kembali</a></div>
        </nav>

        <div class="card" style="margin-top:12px">
            <?php if ($error): ?><div class="alert error"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Judul Project</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($current['title'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Gambar (maks 10MB)<?php if (!empty($current['image'])): ?> — saat ini: <a class="muted" href="<?php echo htmlspecialchars($current['image']); ?>" target="_blank" rel="noopener">lihat</a><?php endif; ?></label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <button class="btn" type="submit"><?php echo $editing ? 'Simpan Perubahan' : 'Tambah Project'; ?></button>
            </form>
        </div>
    </div>
</body>
</html>


