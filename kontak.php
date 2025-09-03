<?php
$siteTitle = 'Ridha';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $siteTitle; ?> · Kontak</title>
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

        .grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:20px}
        .card{background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:12px;padding:16px}
        .card h3{margin:0 0 8px 0}
        .muted{color:var(--muted)}

        .contact-list{display:flex;flex-direction:column;gap:10px;margin:8px 0 0 0}
        .contact-item{display:flex;align-items:center;gap:10px}
        .icon{width:18px;height:18px;display:inline-block;color:var(--brand)}

        .form-group{display:flex;flex-direction:column;gap:6px;margin-bottom:12px}
        label{font-weight:600;font-size:13px;color:#cfd3db}
        input,textarea{background:#0f1116;border:1px solid rgba(255,255,255,.08);color:var(--text);border-radius:10px;padding:10px 12px;font-size:14px}
        textarea{min-height:120px;resize:vertical}
        .btn{background:var(--brand);color:#0b0c0f;padding:10px 14px;border-radius:10px;font-weight:700;font-size:14px;border:none;cursor:pointer}
        .btn.secondary{background:transparent;border:1px solid rgba(255,255,255,.12);color:var(--text)}

        footer{margin:24px 0;color:var(--muted);text-align:center}

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
                <a href="index.php">Index</a>
                <a href="tentang.php">About</a>
                <a href="projek.php">Projek</a>
                <a href="kontak.php">Kontak</a>
                <a href="login.php">Login</a>
            </div>
        </nav>

        <header class="hero">
            <h1>Kontak</h1>
            <p>Hubungi saya untuk kolaborasi, proyek, atau pertanyaan.</p>
        </header>

        <div class="grid">
            <section class="card" aria-labelledby="info-title">
                <h3 id="info-title">Informasi Kontak</h3>
                <div class="contact-list">
                    <div class="contact-item muted">
                        <span class="icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6h16v12H4V6z" stroke="currentColor" stroke-width="1.6"/>
                                <path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.6" fill="none"/>
                            </svg>
                        </span>
                        <span>Email: <a href="mailto:ridharidwan10@gmail.com">ridharidwan10@gmail.com</a></span>
                    </div>
                    <div class="contact-item muted">
                        <span class="icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.6 10.8c1.2 2.4 3.2 4.4 5.6 5.6l1.8-1.8c.2-.2.5-.3.8-.2 1 .3 2 .5 3.1.5.4 0 .7.3.7.7V19c0 .4-.3.7-.7.7C9.9 19.7 4.3 14.1 4.3 7.7c0-.4.3-.7.7-.7H7c.4 0 .7.3.7.7 0 1.1.2 2.1.5 3.1.1.3 0 .6-.2.8l-1.4 1.2z" stroke="currentColor" stroke-width="1.6"/>
                            </svg>
                        </span>
                        <span>Telepon/WhatsApp: <a href="https://wa.me/6282271296078" target="_blank" rel="noopener">+62 822-7129-6078</a> · <a href="tel:+6282271296078">Telepon</a></span>
                    </div>
                    <div class="contact-item muted">
                        <span class="icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.2c-5.4 0-9.8 4.4-9.8 9.8S6.6 21.8 12 21.8s9.8-4.4 9.8-9.8S17.4 2.2 12 2.2zM8.6 12c0-1.9.4-3.6 1.1-5.1M14.3 17.1c-.7 1.5-1.6 2.7-2.3 3.3M15.4 12c0 1.9-.4 3.6-1.1 5.1M9.7 17.1C9 15.6 8.6 13.9 8.6 12m3.4-7.6c.7.6 1.6 1.8 2.3 3.3M12 4.4c-2.9 0-5.3 3.4-5.3 7.6s2.4 7.6 5.3 7.6 5.3-3.4 5.3-7.6-2.4-7.6-5.3-7.6z" stroke="currentColor" stroke-width="1.6"/>
                            </svg>
                        </span>
                        <span>Instagram: <a href="https://www.instagram.com/cybridha/" target="_blank" rel="noopener">@cybridha</a></span>
                    </div>
                    <div class="contact-item muted">
                        <span class="icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 19c-4 0-7-3-7-7s3-7 7-7c3 0 5 2 5 2h4v4s2 2 2 5c0 4-3 7-7 7H9z" stroke="currentColor" stroke-width="1.6"/>
                                <path d="M8 12a4 4 0 108.001.001A4 4 0 008 12z" stroke="currentColor" stroke-width="1.6"/>
                            </svg>
                        </span>
                        <span>GitHub: <a href="https://github.com/ridhaaaaa" target="_blank" rel="noopener">github.com/ridhaaaaa</a></span>
                    </div>
                    <div class="contact-item muted">
                        <span class="icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 3h16v18H4V3z" stroke="currentColor" stroke-width="1.6"/>
                                <path d="M7 8h10M7 12h10M7 16h6" stroke="currentColor" stroke-width="1.6"/>
                            </svg>
                        </span>
                        <span>LinkedIn: <a href="https://www.linkedin.com/in/ridha-ridwan-03604b25b/" target="_blank" rel="noopener">linkedin.com/in/ridha-ridwan-03604b25b</a></span>
                    </div>
                    <div class="contact-item muted">
                        <span class="icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 21s-7-4.7-7-11a7 7 0 1114 0c0 6.3-7 11-7 11z" stroke="currentColor" stroke-width="1.6"/>
                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="1.6"/>
                            </svg>
                        </span>
                        <span>Alamat: Jeumpa, Bireuen, Nanggroe Aceh Darussalam, Indonesia</span>
                    </div>
                </div>
            </section>

            <section class="card" aria-labelledby="form-title">
                <h3 id="form-title">Kirim Pesan</h3>
                <form method="post" action="contact_submit.php">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button class="btn" type="submit">Kirim</button>
                </form>
            </section>
        </div>

        <footer>
            © <?php echo date('Y'); ?> <?php echo $siteTitle; ?>.
        </footer>
    </div>
</body>
</html>


