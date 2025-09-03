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

function saveProjects($projects, $dataFile) {
    file_put_contents($dataFile, json_encode($projects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $new = [];
    foreach ($projects as $p) {
        if ((string)($p['id'] ?? '') !== (string)$id) { $new[] = $p; }
    }
    $projects = $new;
    saveProjects($projects, $dataFile);
    // Hapus dari MySQL
    $db = get_db_connection();
    $stmt = $db->prepare('DELETE FROM projects WHERE id = ?');
    $pid = (int)$id;
    $stmt->bind_param('i', $pid);
    $stmt->execute();
    $stmt->close();
    $db->close();
    header('Location: admin_projects.php');
    exit;
}

$siteTitle = 'Ridha';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $siteTitle; ?> · Admin Projects</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#0b0c0f;--card:#12141a;--muted:#9aa3b2;--text:#e6e9ef;--brand:#7ee081}
        *{box-sizing:border-box}
        html,body{margin:0;padding:0;background:var(--bg);color:var(--text);font-family:'Inter',system-ui,Segoe UI,Roboto,Arial,sans-serif}
        a{text-decoration:none;color:inherit}
        .wrap{max-width:980px;margin:40px auto;padding:0 20px}
        .nav{display:flex;align-items:center;gap:16px}
        .nav .brand{font-weight:800;letter-spacing:.4px}
        .nav .links{margin-left:auto}
        .btn{background:var(--brand);color:#0b0c0f;padding:8px 12px;border-radius:10px;font-weight:700;font-size:13px}
        .btn.secondary{background:transparent;border:1px solid rgba(255,255,255,.12);color:var(--text)}
        .card{background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:12px;padding:16px}
        table{width:100%;border-collapse:collapse}
        th,td{padding:10px;border-bottom:1px solid rgba(255,255,255,.06);text-align:left}
        .muted{color:var(--muted)}
    </style>
</head>
<body>
    <div class="wrap">
        <nav class="nav" aria-label="Admin">
            <div class="brand">Admin · Projects</div>
            <div class="links"><a class="btn secondary" href="dashboard.php">Kembali</a></div>
        </nav>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:16px">
            <h2 class="muted" style="margin:0">Daftar Projects</h2>
            <a class="btn" href="project_form.php">+ Tambah Project</a>
        </div>

        <div class="card" style="margin-top:12px">
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($projects) === 0): ?>
                    <tr><td colspan="3" class="muted">Belum ada project.</td></tr>
                <?php else: foreach ($projects as $p): ?>
                    <tr>
                        <td><?php if (!empty($p['image'])): ?><img src="<?php echo htmlspecialchars($p['image']); ?>" alt="thumb" style="width:80px;height:60px;object-fit:cover;border-radius:8px"><?php endif; ?></td>
                        <td><?php echo htmlspecialchars($p['title'] ?? ''); ?></td>
                        <td>
                            <a class="btn secondary" href="project_form.php?id=<?php echo urlencode($p['id']); ?>">Edit</a>
                            <a class="btn secondary" href="admin_projects.php?delete=<?php echo urlencode($p['id']); ?>" onclick="return confirm('Hapus project ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


