<?php
$siteTitle = 'Ridha';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $siteTitle; ?> · Tentang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#0b0c0f;--card:#12141a;--muted:#9aa3b2;--text:#e6e9ef;--brand:#7ee081}
        *{box-sizing:border-box}
        html,body{margin:0;padding:0;background:var(--bg);color:var(--text);font-family:'Inter',system-ui,Segoe UI,Roboto,Arial,sans-serif}
        img{max-width:100%;display:block}
        a{text-decoration:none;color:inherit}

        .back-link{position:fixed;top:16px;left:16px;display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);padding:8px 12px;border-radius:999px;color:var(--text);font-weight:600;font-size:13px}
        .back-link:hover{background:rgba(255,255,255,.14)}

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

        .section{margin-top:28px}
        .section h2{margin:0 0 12px 0;font-size:18px;color:var(--muted);letter-spacing:.3px}

        /* Timeline */
        .timeline{position:relative;margin-top:16px}
        .timeline:before{content:"";position:absolute;left:16px;top:0;bottom:0;width:2px;background:rgba(255,255,255,.1)}
        .edu-item{position:relative;display:grid;grid-template-columns:28px 1fr;gap:12px;margin-bottom:16px}
        .edu-item .dot{width:12px;height:12px;border-radius:50%;background:var(--brand);position:relative;top:6px;margin-left:10px;box-shadow:0 0 0 4px rgba(126,224,129,.15)}
        .edu-card{background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:12px;padding:16px}
        .edu-meta{display:flex;flex-wrap:wrap;gap:8px;color:#cfd3db;font-size:12px}
        .edu-title{margin:6px 0 4px 0;font-size:16px;font-weight:700}
        .edu-inst{margin:0 0 8px 0;color:#dfe3ea;font-weight:600}
        .edu-list{margin:0;padding-left:18px;color:var(--muted)}
        .edu-list li{margin:4px 0}

        footer{margin:24px 0;color:var(--muted);text-align:center}

        @media (max-width:780px){
        }
    </style>
</head>
<body>
    <a href="index.php" class="back-link" aria-label="Kembali ke beranda">
        <span aria-hidden="true">←</span>
        Kembali
    </a>
    <div class="wrap">
        <nav class="nav" aria-label="Navigasi utama">
            <span class="dot"></span>
            <a class="brand" href="index.php"><?php echo $siteTitle; ?></a>
            <div class="links">
                <a href="index.php">Index</a>
                <a href="tentang.php">About</a>
                <a href="projek.php">Projek</a>
                <a href="kontak.php">Kontak</a>
            </div>
        </nav>

        <header class="hero">
            <h1>Professional Experience</h1>
            <p>Ringkasan pengalaman profesional dan kontribusi di berbagai organisasi.</p>
        </header>

        <section class="section" id="experience">
            <div class="timeline">
                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>09/2024</span>
                            <span>•</span>
                            <span>Lhokseumawe, Aceh</span>
                        </div>
                        <h3 class="edu-title">Web Developer & IT Support</h3>
                        <div class="edu-inst">Hive Organizer</div>
                        <ul class="edu-list">
                            <li>Mengembangkan dan memelihara website perusahaan menggunakan HTML, CSS, PHP, dan MySQL.</li>
                            <li>Menyediakan dukungan IT, perangkat keras, dan software.</li>
                            <li>Bekerja sama dengan tim event untuk mendukung kebutuhan teknologi dalam kegiatan.</li>
                        </ul>
                    </div>
                </article>

                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>05/2024 – 10/2024</span>
                            <span>•</span>
                            <span>Lhokseumawe, Aceh</span>
                        </div>
                        <h3 class="edu-title">Programmer</h3>
                        <div class="edu-inst">CV. Superteam Academy</div>
                        <ul class="edu-list">
                            <li>Mengajar peserta mengenai dasar-dasar pembuatan website menggunakan HTML, CSS, dan PHP.</li>
                            <li>Membimbing peserta dalam instalasi software dan tools pendukung pengembangan web (XAMPP, text editor, database).</li>
                        </ul>
                    </div>
                </article>

                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>02/2024 – 08/2024</span>
                            <span>•</span>
                            <span>Lhokseumawe, Aceh</span>
                        </div>
                        <h3 class="edu-title">Intern – Event Organizer</h3>
                        <div class="edu-inst">UPT. BKK Universitas Malikussaleh</div>
                        <ul class="edu-list">
                            <li>Membantu perencanaan dan pelaksanaan acara kampus di bawah UPT BKK.</li>
                            <li>Mendapatkan pengalaman dalam manajemen event dan teamwork lintas divisi.</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        

        <header class="hero">
            <h1>Education</h1>
            <p>Ringkasan perjalanan pendidikan dan pengalaman akademik.</p>
        </header>

        <section class="section" id="education">
            <div class="timeline">
                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>08/2021 – 08/2025</span>
                            <span>•</span>
                            <span>Lhokseumawe, Aceh, Indonesia</span>
                        </div>
                        <h3 class="edu-title">Teknik Informatika</h3>
                        <div class="edu-inst">Universitas Malikussaleh</div>
                        <ul class="edu-list">
                            <li>Lulus dengan IPK 3.60/4.00</li>
                            <li>Fokus pada Pengembangan Web, Basis Data, dan Desain UI/UX</li>
                            <li>Aktif dalam organisasi kemahasiswaan dan kepanitiaan dengan pengalaman kepemimpinan</li>
                        </ul>
                    </div>
                </article>

                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>08/2023 – 12/2023</span>
                            <span>•</span>
                            <span>Sumedang, Jawa Barat, Indonesia</span>
                        </div>
                        <h3 class="edu-title">Teknik Elektro</h3>
                        <div class="edu-inst">Universitas Padjadjaran</div>
                        <ul class="edu-list">
                            <li>Mengikuti Program Pertukaran Mahasiswa Merdeka (Batch 3)</li>
                            <li>Menyelesaikan perkuliahan dan proyek kolaboratif lintas jurusan</li>
                            <li>Mengembangkan komunikasi, kerja sama tim, dan adaptabilitas lintas budaya</li>
                        </ul>
                    </div>
                </article>

                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>08/2018 – 08/2021</span>
                            <span>•</span>
                            <span>MA Darussadah Cot Tarom Baroh</span>
                        </div>
                        <h3 class="edu-title">Madrasah Aliyah</h3>
                        <div class="edu-inst">MA Darussadah</div>
                        <ul class="edu-list">
                            <li>Aktif mengikuti kegiatan pencak silat selama bersekolah</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <header class="hero">
            <h1>Pengalaman Organisasi</h1>
            <p>Keterlibatan dan peran dalam organisasi kemahasiswaan.</p>
        </header>

        <section class="section" id="organization">
            <div class="timeline">
                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>Feb 2023 – Feb 2024</span>
                            <span>•</span>
                            <span>Kota Lhokseumawe</span>
                        </div>
                        <h3 class="edu-title">Ketua Keorganisasian</h3>
                        <div class="edu-inst">UKM Tapak Suci Universitas Malikussaleh</div>
                        <ul class="edu-list">
                            <li>Mengelola dan memimpin tim organisasi, memastikan komunikasi dan kolaborasi efektif.</li>
                            <li>Mengembangkan dan mengimplementasikan rencana strategis organisasi.</li>
                            <li>Mengorganisir serta mengawasi pelaksanaan kegiatan dan acara organisasi.</li>
                        </ul>
                    </div>
                </article>

                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>Aug 2023 – Present</span>
                            <span>•</span>
                            <span>Bireuen</span>
                        </div>
                        <h3 class="edu-title">Wakil Ketua Umum</h3>
                        <div class="edu-inst">IMKJ Bireuen (Ikatan Mahasiswa Kota Juang)</div>
                        <ul class="edu-list">
                            <li>Mendukung Ketua Umum dalam mengelola dan mengarahkan kegiatan organisasi.</li>
                            <li>Berpartisipasi dalam perencanaan dan eksekusi rencana strategis organisasi.</li>
                        </ul>
                    </div>
                </article>

                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>Sep 2023 – Present</span>
                            <span>•</span>
                            <span>Kota Lhokseumawe</span>
                        </div>
                        <h3 class="edu-title">Wakil Ketua Agama & Sosial</h3>
                        <div class="edu-inst">HIMATIF · Himpunan Mahasiswa Teknik Informatika</div>
                        <ul class="edu-list">
                            <li>Mendukung Ketua dalam mengelola kegiatan keagamaan dan sosial.</li>
                            <li>Merancang dan menjalankan program yang selaras dengan visi dan misi organisasi.</li>
                        </ul>
                    </div>
                </article>

                <article class="edu-item">
                    <span class="dot" aria-hidden="true"></span>
                    <div class="edu-card">
                        <div class="edu-meta">
                            <span>Feb 2024 – Present</span>
                            <span>•</span>
                            <span>Kota Lhokseumawe</span>
                        </div>
                        <h3 class="edu-title">Bendahara Umum</h3>
                        <div class="edu-inst">Superteam Batch VI · UPT. BKK Universitas Malikussaleh</div>
                        <ul class="edu-list">
                            <li>Mengelola dan mengawasi aspek keuangan: anggaran, pengeluaran, dan pendapatan.</li>
                            <li>Menyusun dan mengelola anggaran tahunan secara efektif dan efisien.</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <footer>
            © <?php echo date('Y'); ?> <?php echo $siteTitle; ?>. 
        </footer>
    </div>
</body>
</html>


