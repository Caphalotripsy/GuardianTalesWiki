<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Hero - Guardian Tales Wiki</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS Khusus Tabel Katalog */
        table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 15px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        th { background-color: #0e1a2b; color: #ffc107; padding: 15px; text-align: left; text-transform: uppercase; font-size: 13px; letter-spacing: 1px; }
        td { padding: 15px; border-bottom: 1px solid #f0f0f0; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background-color: #f9fcff; }
        
        .hero-avatar { width: 60px; height: 60px; border-radius: 10px; object-fit: cover; border: 2px solid #eee; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .hero-name { font-weight: bold; font-size: 16px; color: #2c3e50; }
        
        /* Badge Styles */
        .badge { padding: 6px 12px; border-radius: 20px; font-size: 11px; font-weight: bold; color: white; display: inline-block; min-width: 60px; text-align: center; }
        .bg-dark { background-color: #6a1b9a; }
        .bg-light { background-color: #fbc02d; color: #333; }
        .bg-fire { background-color: #d32f2f; }
        .bg-water { background-color: #0288d1; }
        .bg-earth { background-color: #388e3c; }
        .bg-basic { background-color: #757575; }

        .btn-detail {
            background-color: #008CBA; color: white; padding: 8px 15px; 
            border-radius: 5px; text-decoration: none; font-size: 13px; font-weight: bold;
            transition: 0.3s; display: inline-block;
        }
        .btn-detail:hover { background-color: #005f7f; transform: translateY(-2px); }
    </style>
</head>
<body>

    <!-- HEADER (Sama dengan Index) -->
    <header class="main-header">
        <div class="logo-area">
            <img src="img/logo_main_shield.jpg" alt="GT Logo" class="brand-logo">
            <div>
                <h1>GUARDIAN TALES WIKI</h1>
                <p>Database & Komunitas Terlengkap</p>
            </div>
        </div>
    </header>

    <!-- NAVBAR -->
    <nav class="sticky-navbar">
        <ul class="nav-menu">
            <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="hero_tampil.php" class="active"><i class="fas fa-users"></i>Hero</a></li>
            <li><a href="#"><i class="fas fa-swords"></i> Equipment</a></li>
            <li><a href="#"><i class="fas fa-book"></i> Guides</a></li>
        </ul>
    </nav>

    <!-- KONTEN -->
    <div class="container main-body">
        
        <!-- SIDEBAR -->
        <aside class="sidebar-right">
            <div class="sidebar-widget">
                <h3><i class="fas fa-search"></i> Filter Hero</h3>
                <p>Temukan hero berdasarkan elemen atau role.</p>
                <ul>
                    <li><a href="#">SSR Only</a></li>
                    <li><a href="#">Rare Heroes</a></li>
                </ul>
            </div>
        </aside>

        <!-- MAIN SECTION -->
        <section class="content">
            <div style="border-bottom: 2px solid #eee; margin-bottom: 20px; padding-bottom: 10px;">
                <h2 style="margin:0; color: #0e1a2b;">Daftar Hero</h2>
                <p style="margin:5px 0 0; color: #666;">Klik tombol detail untuk melihat status lengkap, skill, dan party buff.</p>
            </div>

            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th width="80">Foto</th>
                            <th>Nama Hero</th>
                            <th>Elemen</th>
                            <th>Role</th>
                            <th width="100">Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config/koneksi.php";
                        $hasil = $db->query("SELECT * FROM hero ORDER BY nama_hero ASC");
                        
                        while ($d = $hasil->fetch_assoc()) {
                            // Logic Warna Elemen
                            $badge_class = 'bg-basic';
                            if($d['elemen'] == 'Dark') $badge_class = 'bg-dark';
                            if($d['elemen'] == 'Light') $badge_class = 'bg-light';
                            if($d['elemen'] == 'Fire') $badge_class = 'bg-fire';
                            if($d['elemen'] == 'Water') $badge_class = 'bg-water';
                            if($d['elemen'] == 'Earth') $badge_class = 'bg-earth';
                        ?>
                        <tr>
                            <td>
                                <?php if(!empty($d['gambar'])): ?>
                                    <img src="img/<?php echo $d['gambar']; ?>" class="hero-avatar">
                                <?php else: ?>
                                    <img src="img/logo_gt.png" class="hero-avatar" style="opacity:0.5; padding:10px; background:#eee;">
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="hero-name"><?php echo $d['nama_hero']; ?></div>
                                <span style="font-size: 12px; color: #888;">SSR Hero</span>
                            </td>
                            <td><span class="badge <?php echo $badge_class; ?>"><?php echo $d['elemen']; ?></span></td>
                            <td style="font-weight:bold; color:#555;"><?php echo $d['role']; ?></td>
                            <td>
                                <!-- Tombol Masuk ke Halaman Detail -->
                                <a href="hero_detail.php?id=<?php echo $d['id_hero']; ?>" class="btn-detail">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</body>
</html>