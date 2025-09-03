<?php
session_start();
$siteTitle = 'Ridha';

$loginMessage = '';
$loginSuccess = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    if ($username === 'ridha' && $password === 'ridha') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $loginMessage = 'Username atau kata sandi salah.';
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $siteTitle; ?> · Login</title>
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

        .hero{margin-top:24px;background:linear-gradient(180deg,rgba(255,255,255,.04),transparent),var(--card);border:1px solid rgba(255,255,255,.06);border-radius:16px;padding:24px}
        .hero h1{margin:0;font-size:28px}
        .hero p{margin:8px 0 0 0;color:var(--muted)}

        .center{display:flex;justify-content:center;align-items:center;margin-top:20px}
        .card{background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:12px;padding:20px;max-width:420px;width:100%}
        .form-group{display:flex;flex-direction:column;gap:6px;margin-bottom:12px}
        label{font-weight:600;font-size:13px;color:#cfd3db}
        input{background:#0f1116;border:1px solid rgba(255,255,255,.08);color:var(--text);border-radius:10px;padding:10px 12px;font-size:14px}
        .btn{background:var(--brand);color:#0b0c0f;padding:10px 14px;border-radius:10px;font-weight:700;font-size:14px;border:none;cursor:pointer;width:100%}
        .helper{margin-top:10px;text-align:center;color:var(--muted);font-size:13px}

        footer{margin:24px 0;color:var(--muted);text-align:center}

        .alert{border-radius:10px;padding:10px 12px;margin:0 0 12px 0;font-size:14px}
        .alert.success{background:rgba(126,224,129,.15);border:1px solid rgba(126,224,129,.35);color:#bdf2c2}
        .alert.error{background:rgba(255,99,71,.12);border:1px solid rgba(255,99,71,.35);color:#ffb3a7}
    </style>
</head>
<body>
    <div class="wrap">
        <nav class="nav" aria-label="Navigasi utama">
            <span class="dot"></span>
            <a class="brand" href="index.php"><?php echo $siteTitle; ?></a>
            <div class="links">
                <a href="index.php">Index</a>
                <a href="tentang.php">About</a>
                <a href="projek.php">Projek</a>
                <a href="kontak.php">Kontak</a>
                <a href="login.php">Login</a>
            </div>
        </nav>

        <header class="hero">
            <h1>Login</h1>
            <p>Masuk untuk mengelola konten Anda.</p>
        </header>

        <div class="center">
            <section class="card" aria-labelledby="login-title">
                <h3 id="login-title" style="margin:0 0 12px 0;">Form Login</h3>
                <?php if ($loginMessage !== ''): ?>
                    <div class="alert <?php echo $loginSuccess ? 'success' : 'error'; ?>"><?php echo htmlspecialchars($loginMessage); ?></div>
                <?php endif; ?>
                <form method="post" action="login.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button class="btn" type="submit">Masuk</button>
                </form>
            </section>
        </div>

        <footer>
            © <?php echo date('Y'); ?> <?php echo $siteTitle; ?>.
        </footer>
    </div>
</body>
</html>


