<?php session_start(); if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { header('Location: login.php'); exit; } ?>
<?php
$siteTitle = 'Ridha';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $siteTitle; ?> · Dashboard</title>
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
        .nav .dot{width:8px;height:8px;border-radius:50%;background:var(--brand)}
        .nav .links{margin-left:auto;display:flex;gap:16px}
        .nav .links a{color:var(--muted);font-weight:600;font-size:13px}
        .nav .links a:hover{color:var(--text)}

        .btn{background:var(--brand);color:#0b0c0f;padding:8px 12px;border-radius:10px;font-weight:700;font-size:13px}
        .btn.secondary{background:transparent;border:1px solid rgba(255,255,255,.12);color:var(--text)}

        .hero{margin-top:24px;background:linear-gradient(180deg,rgba(255,255,255,.04),transparent),var(--card);border:1px solid rgba(255,255,255,.06);border-radius:16px;padding:24px}
        .hero h1{margin:0;font-size:28px}
        .hero p{margin:8px 0 0 0;color:var(--muted)}

        .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:20px}
        .card{background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:12px;padding:16px}
        .card h3{margin:0 0 8px 0}
        .muted{color:var(--muted)}

        @media (max-width:780px){
            .grid{grid-template-columns:1fr}
        }
    </style>
</head>
<body>
    <div class="wrap">
        <nav class="nav" aria-label="Navigasi utama">
            <span class="dot"></span>
            <a class="brand" href="index.php"><?php echo $siteTitle; ?></a>
            <div class="links">
                <a class="btn secondary" href="logout.php">Logout</a>
            </div>
        </nav>

        <header class="hero">
            <h1>Dashboard</h1>
            <p>Login berhasil. Selamat datang.</p>
        </header>

        <div class="grid">
            <section class="card">
                <h3>Projects</h3>
                <p class="muted">Kelola project yang tampil di beranda.</p>
                <p><a class="btn" href="admin_projects.php">Kelola Projects</a></p>
            </section>
            <section class="card">
                <h3>Pesan Masuk</h3>
                <div class="muted">Berikut pesan terbaru dari halaman kontak:</div>
                <?php
                require_once __DIR__ . '/config.php';
                $db = get_db_connection();
                $res = $db->query('SELECT name, email, message, created_at FROM messages ORDER BY id DESC LIMIT 5');
                if ($res && $res->num_rows > 0): ?>
                    <ul style="margin:8px 0 0 16px; padding:0; list-style:disc; color:#cfd3db;">
                        <?php while($row = $res->fetch_assoc()): ?>
                            <li style="margin:6px 0;">
                                <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                                <span class="muted">(<?php echo htmlspecialchars($row['email']); ?>) • <?php echo htmlspecialchars($row['created_at']); ?></span>
                                <div class="muted" style="margin-top:4px;">"<?php echo nl2br(htmlspecialchars($row['message'])); ?>"</div>
                            </li>
                        <?php endwhile; $res->free(); $db->close(); ?>
                    </ul>
                <?php else: ?>
                    <p class="muted" style="margin-top:8px;">Belum ada pesan.</p>
                <?php endif; ?>
            </section>
        </div>

        <footer style="margin:24px 0;color:var(--muted);text-align:center">
            © <?php echo date('Y'); ?> <?php echo $siteTitle; ?>.
        </footer>
    </div>
</body>
</html>


