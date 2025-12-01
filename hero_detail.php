<?php
include "config/koneksi.php";
$id = $_GET['id'];
$query = $db->query("SELECT * FROM hero WHERE id_hero='$id'");
$data = $query->fetch_assoc();

if(!$data) {
    echo "Hero tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['nama_hero']; ?> - GT Wiki</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Style Khusus Halaman Detail */
        .hero-header { display: flex; gap: 30px; align-items: flex-start; margin-bottom: 30px; }
        .hero-portrait { width: 200px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); border: 4px solid white; }
        .hero-info h2 { font-size: 32px; margin: 0 0 10px; color: #0e1a2b; }
        .stat-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-top: 20px; }
        .stat-box { background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #008CBA; }
        .stat-label { font-size: 12px; text-transform: uppercase; color: #666; display: block; margin-bottom: 5px; }
        .stat-value { font-weight: bold; font-size: 16px; color: #333; }
        
        .skill-section { margin-top: 30px; }
        .skill-card { background: #fff; border: 1px solid #eee; padding: 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .skill-title { font-weight: bold; color: #d35400; font-size: 18px; margin-bottom: 5px; display: block; }
    </style>
</head>
<body>

    <!-- HEADER & NAV TETAP SAMA AGAR KONSISTEN -->
    <header class="main-header">
        <div class="logo-area">
            <img src="img/logo_main_shield.jpg" alt="GT Logo" class="brand-logo">
            <div>
                <h1>GUARDIAN TALES WIKI</h1>
                <p>Database & Komunitas Terlengkap</p>
            </div>
        </div>
    </header>

    <nav class="sticky-navbar">
        <ul class="nav-menu">
            <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="hero_tampil.php" class="active"><i class="fas fa-users"></i>Hero</a></li>
            <li><a href="#"><i class="fas fa-swords"></i> Equipment</a></li>
            <li><a href="#"><i class="fas fa-book"></i> Guides</a></li>
        </ul>
    </nav>

    <div class="container main-body">
        
        <!-- SIDEBAR -->
        <aside class="sidebar-right">
            <div class="sidebar-widget">
                <h3>Navigasi</h3>
                <ul>
                    <li><a href="hero_tampil.php"><i class="fas fa-arrow-left"></i> Kembali ke Daftar</a></li>
                </ul>
            </div>
        </aside>

        <!-- KONTEN DETAIL -->
        <section class="content">
            
            <div class="hero-header">
                <!-- Foto Besar -->
                <div>
                    <?php if(!empty($data['gambar'])): ?>
                        <img src="img/<?php echo $data['gambar']; ?>" class="hero-portrait">
                    <?php else: ?>
                        <img src="img/logo_gt.png" class="hero-portrait" style="background:#eee; padding:20px;">
                    <?php endif; ?>
                </div>

                <!-- Info Utama -->
                <div class="hero-info" style="flex: 1;">
                    <h2><?php echo $data['nama_hero']; ?></h2>
                    <span style="background: #0e1a2b; color: #ffc107; padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: bold;">SSR Hero</span>
                    
                    <div class="stat-grid">
                        <div class="stat-box">
                            <span class="stat-label">Elemen</span>
                            <span class="stat-value"><?php echo $data['elemen']; ?></span>
                        </div>
                        <div class="stat-box">
                            <span class="stat-label">Role</span>
                            <span class="stat-value"><?php echo $data['role']; ?></span>
                        </div>
                        <div class="stat-box">
                            <span class="stat-label">Senjata</span>
                            <span class="stat-value"><?php echo !empty($data['weapon']) ? $data['weapon'] : '-'; ?></span>
                        </div>
                        <div class="stat-box" style="background: #e3f2fd; border-left-color: #1976d2;">
                            <span class="stat-label">Party Buff</span>
                            <span class="stat-value"><?php echo $data['party_buff']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">

            <!-- SKILL INFO -->
            <div class="skill-section">
                <h3 style="color: #0e1a2b; border-bottom: 2px solid #ffc107; padding-bottom: 10px; display:inline-block;">Informasi Skill</h3>
                
                <div class="skill-card">
                    <span class="skill-title"><i class="fas fa-fist-raised"></i> Basic Attack</span>
                    <p><?php echo !empty($data['basic_atk']) ? $data['basic_atk'] : 'Belum ada data.'; ?></p>
                </div>

                <div class="skill-card">
                    <span class="skill-title" style="color: #8e44ad;"><i class="fas fa-magic"></i> Weapon Skill</span>
                    <p><?php echo !empty($data['skill']) ? $data['skill'] : 'Belum ada data.'; ?></p>
                </div>

                <div class="skill-card">
                    <span class="skill-title" style="color: #27ae60;"><i class="fas fa-link"></i> Chain Skill</span>
                    <p><?php echo !empty($data['chain_skill']) ? $data['chain_skill'] : 'Belum ada data.'; ?></p>
                </div>
            </div>

            <!-- DESKRIPSI -->
            <div class="skill-section">
                <h3>Deskripsi Cerita</h3>
                <p style="line-height: 1.6; color: #555;">
                    <?php echo nl2br($data['deskripsi']); ?>
                </p>
            </div>

        </section>
    </div>

</body>
</html>