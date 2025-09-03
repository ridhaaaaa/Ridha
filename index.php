<?php
$siteTitle = 'Ridha';
$tagline = '';
$photo = 'images/profile.jpg'; // ganti sesuai nama file Anda

$bio = 'Lulusan Teknik Informatika Universitas Malikussaleh dengan keahlian Web Development dan UI/UX Design. Terampil menggunakan Figma, HTML, CSS, PHP, dan MySQL, serta berpengalaman dalam kerja tim, kepemimpinan, dan manajemen proyek.';

$skills = [
    'Web Development','Communication'
];

$projects = [
    ['title'=>'Event Organizer Aceh – Website Showcase & Event Management','image'=>'images/hive.png'],
    ['title'=>'Sistem Monitoring Sensor Realtime Berbasis Web','image'=>'images/melon.png'],
    ['title'=>'Clean Architecture','image'=>'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=1200&auto=format&fit=crop'],
    ['title'=>'Branding Blocks','image'=>'https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?q=80&w=1200&auto=format&fit=crop'],
];

// Override dari data file jika ada
$dataFile = __DIR__ . '/data/projects.json';
if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) { $projects = $decoded; }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $siteTitle; ?> · Portofolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#0b0c0f;--card:#12141a;--muted:#9aa3b2;--text:#e6e9ef;--brand:#7ee081}
        *{box-sizing:border-box}
        html,body{margin:0;padding:0;background:var(--bg);color:var(--text);font-family:'Inter',system-ui,Segoe UI,Roboto,Arial,sans-serif}
        img{max-width:100%;display:block}
        a{text-decoration:none;color:inherit}

        .wrap{max-width:980px;margin:40px auto;padding:0 20px}
        .nav{display:flex;align-items:center;gap:16px}
        .nav .brand{font-weight:800;letter-spacing:.4px}
        .nav .dot{width:8px;height:8px;border-radius:50%;background:var(--brand)}
        .nav .links{margin-left:auto;display:flex;gap:16px}
        .nav .links a{color:var(--muted);font-weight:600;font-size:13px}
        .nav .links a:hover{color:var(--text)}

        .hero{margin-top:24px;background:linear-gradient(180deg,rgba(255,255,255,.04),transparent),var(--card);border:1px solid rgba(255,255,255,.06);border-radius:16px;padding:28px;display:grid;grid-template-columns:160px 1fr;gap:24px;align-items:center}
        .hero .photo img{border-radius:12px;filter:grayscale(100%)}
        .hero h1{margin:0;font-size:36px}
        .hero .sub{color:var(--muted);font-weight:600;margin-top:4px}
        .hero .tag{display:inline-flex;align-items:center;gap:8px;background:rgba(126,224,129,.15);color:#bdf2c2;border:1px solid rgba(126,224,129,.35);padding:6px 10px;border-radius:999px;font-size:12px;font-weight:700}
        .hero .desc{color:var(--muted);margin-top:10px}
        .hero .cta{margin-top:16px;display:flex;gap:10px}
        .btn{background:var(--brand);color:#0b0c0f;padding:10px 14px;border-radius:10px;font-weight:700;font-size:14px}
        .btn.secondary{background:transparent;border:1px solid rgba(255,255,255,.12);color:var(--text)}

        .section{margin-top:28px}
        .section h2{margin:0 0 12px 0;font-size:18px;color:var(--muted);letter-spacing:.3px}

        .skills{display:flex;flex-wrap:wrap;gap:8px}
        .chip{background:#0f1116;border:1px solid rgba(255,255,255,.08);padding:8px 12px;border-radius:999px;color:var(--text);font-size:12px}

        .grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px}
        .card{background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:12px;overflow:hidden}
        .card img{width:100%;height:140px;object-fit:cover;filter:grayscale(100%)}
        .card .meta{padding:10px 12px;font-weight:600}

        /* Lightbox */
        .lightbox{position:fixed;inset:0;background:rgba(0,0,0,.8);display:none;align-items:center;justify-content:center;z-index:9999}
        .lightbox.open{display:flex}
        .lightbox .frame{max-width:90vw;max-height:85vh;display:flex;flex-direction:column;gap:10px;align-items:center}
        .lightbox img{max-width:100%;max-height:75vh;border-radius:12px}
        .lightbox .actions{display:flex;gap:8px}
        .lightbox .close{background:#ffffff;color:#000;border:none;padding:8px 12px;border-radius:8px;font-weight:700;cursor:pointer}
        .lightbox .caption{color:#cfd3db;text-align:center}

        .contact{display:grid;grid-template-columns:1fr auto;align-items:center;background:linear-gradient(180deg,rgba(255,255,255,.04),transparent),var(--card);border:1px solid rgba(255,255,255,.06);border-radius:12px;padding:18px}
        .contact .note{color:var(--muted)}

        footer{margin:24px 0;color:var(--muted);text-align:center}

        @media (max-width:780px){
            .hero{grid-template-columns:1fr}
            .grid{grid-template-columns:repeat(2,1fr)}
            .contact{grid-template-columns:1fr}
        }
        @media (max-width:420px){
            .grid{grid-template-columns:1fr}
        }
    </style>
</head>
<body>
    <div class="wrap">
        <nav class="nav" aria-label="Navigasi utama">
            <span class="dot"></span>
            <div class="brand"><?php echo $siteTitle; ?></div>
            <div class="links">
                <a href="index.php">Index</a>
                <a href="tentang.php">About</a>
                <a href="projek.php">Projek</a>
                <a href="kontak.php">Kontak</a>
                
            </div>
        </nav>

        <header class="hero" id="home">
            <div class="photo">
                <img src="images/foto.jpg" alt="Foto.jpg <?php echo $siteTitle; ?>" />
            </div>
            <div>
                <h1><?php echo $siteTitle; ?></h1>
                <?php if (trim($tagline) !== ''): ?>
                <div class="sub"><?php echo $tagline; ?></div>
                <?php endif; ?>
                <p class="desc"><?php echo $bio; ?></p>
                <div class="cta">
                    <a class="btn" href="https://wa.me/6282271296078">Contact Me</a>
                </div>
            </div>
        </header>

        <section class="section" id="about">
            <h2>Kemampuan</h2>
            <div class="skills">
                <?php foreach($skills as $s): ?>
                    <span class="chip"><?php echo htmlspecialchars($s); ?></span>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="section" id="">
            <h2>Projek Terbaru</h2>
            <div class="grid">
                <?php foreach($projects as $p): ?>
                <article class="card">
                    <img src="<?php echo $p['image']; ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" loading="lazy" />
                    <div class="meta"><?php echo htmlspecialchars($p['title']); ?></div>
                </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="section contact" id="contact" aria-labelledby="contact-title">
            <div>
                <h2 id="contact-title">Ayo berkolaborasi</h2>
                <p class="note">Kunjungi halaman <a href="kontak.php">Kontak</a> untuk mengirim pesan.</p>
            </div>
            <a class="btn" href="kontak.php">Buka Halaman Kontak</a>
        </section>

        <div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Preview gambar">
            <div class="frame">
                <img id="lightbox-img" src="" alt="Preview" />
                <div class="caption" id="lightbox-cap"></div>
                <div class="actions">
                    <button class="close" id="lightbox-close" type="button">Tutup</button>
                </div>
            </div>
        </div>

        <footer>
            © <?php echo date('Y'); ?> <?php echo $siteTitle; ?>. 
        </footer>
    </div>
    <script>
    (function(){
        const lb = document.getElementById('lightbox');
        const lbImg = document.getElementById('lightbox-img');
        const lbCap = document.getElementById('lightbox-cap');
        const lbClose = document.getElementById('lightbox-close');

        function openLightbox(src, caption){
            lbImg.src = src;
            lbCap.textContent = caption || '';
            lb.classList.add('open');
        }
        function closeLightbox(){
            lb.classList.remove('open');
            lbImg.src = '';
            lbCap.textContent = '';
        }

        // Klik pada gambar proyek
        document.querySelectorAll('.grid .card img').forEach(function(img){
            img.addEventListener('click', function(){
                const src = img.getAttribute('src');
                const title = img.closest('.card').querySelector('.meta')?.textContent?.trim() || '';
                // Buka untuk semua gambar; khusus permintaan: ini mencakup hive.png dan melon.png
                openLightbox(src, title);
            });
        });

        lb.addEventListener('click', function(e){
            if (e.target === lb) closeLightbox();
        });
        lbClose.addEventListener('click', closeLightbox);
        document.addEventListener('keydown', function(e){
            if (e.key === 'Escape') closeLightbox();
        });
    })();
    </script>
</body>
</html>


