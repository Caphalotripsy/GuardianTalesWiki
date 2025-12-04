<?php
include "config/koneksi.php";

// Cek tabel 'party' (Self-Healing)
$cek_tabel = $db->query("SHOW TABLES LIKE 'party'");
if ($cek_tabel->num_rows == 0) {
    $db->query("CREATE TABLE party (
        id_party INT AUTO_INCREMENT PRIMARY KEY,
        nama_party VARCHAR(100) NOT NULL,
        deskripsi VARCHAR(255),
        hero1 INT, hero2 INT, hero3 INT, hero4 INT
    )");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Party Builder - GT Wiki</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* --- LAYOUT GRID --- */
        .party-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); 
            gap: 25px; 
        }
        
        /* --- KARTU PARTY --- */
        .party-card { 
            background: white; 
            border-radius: 12px; 
            overflow: hidden; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.05); 
            border: 1px solid #e0e0e0; 
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column; /* Agar footer selalu di bawah */
        }
        
        .party-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 15px 30px rgba(0,0,0,0.1); 
            border-color: #008CBA;
        }
        
        /* Header Kartu */
        .party-header { 
            background: linear-gradient(135deg, #0e1a2b 0%, #1c2833 100%); 
            color: #ffc107; 
            padding: 15px 20px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 2px solid #ffc107;
        }
        .party-header h3 { margin: 0; font-size: 16px; font-weight: 700; }
        
        /* Slot Hero (Area Gambar) */
        .party-slots { 
            display: flex; 
            justify-content: space-between; 
            padding: 20px 15px; 
            background-color: #f8f9fa; 
            gap: 10px;
            /* PERBAIKAN JARAK KE BAWAH */
            margin-bottom: 10px; 
            border-bottom: 1px solid #eee;
        }
        
        .slot { 
            width: 65px; height: 65px; 
            border-radius: 10px; 
            background: #e9ecef; 
            border: 2px solid #fff; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
            position: relative; 
            display: flex; align-items: center; justify-content: center;
        }
        
        .slot img { 
            width: 100%; height: 100%; 
            object-fit: cover; border-radius: 8px; 
        }
        
        .slot span { 
            position: absolute; bottom: -25px; left: 50%; transform: translateX(-50%); 
            font-size: 10px; font-weight: bold; color: #555; 
            white-space: nowrap; width: 100%; text-align: center; 
            overflow: hidden; text-overflow: ellipsis;
        }

        /* Deskripsi (Area Teks) */
        .party-desc {
            padding: 10px 20px 20px 20px; /* Padding atas bawah kanan kiri */
            font-size: 13px; 
            color: #666; 
            font-style: italic;
            line-height: 1.5;
            flex-grow: 1; /* Isi ruang kosong agar footer terdorong ke bawah */
        }

        /* Footer */
        .party-footer { 
            padding: 12px 15px; 
            background: #fff; 
            text-align: right; 
            border-top: 1px solid #f0f0f0; 
        }
        
        /* Tombol Hapus Kecil */
        .btn-sm { 
            font-size: 11px; padding: 6px 12px; border-radius: 4px; 
            text-decoration: none; color: white; display: inline-block; font-weight: bold;
        }
        .btn-del { background: #e74c3c; transition: 0.3s; }
        .btn-del:hover { background: #c0392b; }

        /* --- PERBAIKAN TOMBOL SIDEBAR --- */
        .sidebar-btn-container {
            text-align: center;
            padding: 10px 0;
        }

        .btn-create-party {
            display: block;
            width: 100%;
            background-color: #008CBA; /* Warna Biru */
            color: white;
            padding: 12px 0;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid #007bb5;
        }

        .btn-create-party:hover {
            background-color: #007bb5;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

    <header class="main-header">
        <div class="logo-area">
            <img src="img/logo_main_shield.jpg" alt="GT Logo" class="brand-logo">
            <div>
                <h1>GUARDIAN TALES WIKI</h1>
                <p>Team Builder</p>
            </div>
        </div>
    </header>

    <nav class="sticky-navbar">
        <ul class="nav-menu">
            <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="hero_tampil.php"><i class="fas fa-users"></i> Hero</a></li>
            <li><a href="equipment_tampil.php"><i class="fas fa-swords"></i> Equipment</a></li>
            <li><a href="party_tampil.php" class="active"><i class="fas fa-chess"></i> Pengaturan Party</a></li>
        </ul>
    </nav>

    <div class="container main-body">
        
        <aside class="sidebar-right">
            <div class="sidebar-widget">
                <h3><i class="fas fa-info-circle"></i> Info Party</h3>
                <p>Buat komposisi tim terbaikmu untuk Raid, Colosseum, atau Arena. Simpan dan bagikan strategi!</p>
            </div>
            
            <div class="sidebar-widget">
                <div class="sidebar-btn-container">
                    <a href="party_form.php" class="btn-create-party">
                        <i class="fas fa-plus-circle"></i> Buat Party Baru
                    </a>
                </div>
            </div>
        </aside>

        <section class="content">
            <div style="border-bottom: 2px solid #eee; margin-bottom: 20px; padding-bottom: 10px;">
                <h2 style="margin:0; color: #0e1a2b;">Party Saya</h2>
                <p style="margin:5px 0 0; color: #666;">Daftar tim yang sudah Anda racik.</p>
            </div>

            <div class="party-grid">
                <?php
                // --- BAGIAN QUERY DATA ---
                $sql = "SELECT 
                            p.id_party, p.nama_party, p.deskripsi,
                            h1.nama_hero AS nm1, h1.gambar AS img1,
                            h2.nama_hero AS nm2, h2.gambar AS img2,
                            h3.nama_hero AS nm3, h3.gambar AS img3,
                            h4.nama_hero AS nm4, h4.gambar AS img4
                        FROM party p
                        LEFT JOIN hero h1 ON p.hero1 = h1.id_hero
                        LEFT JOIN hero h2 ON p.hero2 = h2.id_hero
                        LEFT JOIN hero h3 ON p.hero3 = h3.id_hero
                        LEFT JOIN hero h4 ON p.hero4 = h4.id_hero
                        ORDER BY p.id_party DESC";

                $hasil = $db->query($sql);

                if ($hasil && $hasil->num_rows > 0) {
                    while ($d = $hasil->fetch_assoc()) {
                ?>
                
                <div class="party-card">
                    <div class="party-header">
                        <h3><?php echo htmlspecialchars($d['nama_party']); ?></h3>
                        <i class="fas fa-chess-knight"></i>
                    </div>
                    
                    <div class="party-slots">
                        <?php 
                        $slots = [
                            ['img' => $d['img1'], 'nm' => $d['nm1']],
                            ['img' => $d['img2'], 'nm' => $d['nm2']],
                            ['img' => $d['img3'], 'nm' => $d['nm3']],
                            ['img' => $d['img4'], 'nm' => $d['nm4']]
                        ];

                        foreach($slots as $s) {
                            echo '<div class="slot">';
                            if(!empty($s['img'])) {
                                echo '<img src="img/hero/'.$s['img'].'" title="'.$s['nm'].'">';
                                echo '<span>'.$s['nm'].'</span>';
                            } else {
                                echo '<i class="fas fa-plus" style="color:#ccc;"></i>';
                                echo '<span>Empty</span>';
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>

                    <div class="party-desc">
                        <?php echo !empty($d['deskripsi']) ? '"'.htmlspecialchars($d['deskripsi']).'"' : '- Tidak ada deskripsi -'; ?>
                    </div>

                    <div class="party-footer">
                        <a href="aksi/party_hapus.php?id=<?php echo $d['id_party']; ?>" class="btn-sm btn-del" onclick="return confirm('Yakin ingin menghapus party ini?');">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </a>
                    </div>
                </div>
                <?php 
                    }
                } else {
                    echo "<div style='text-align:center; padding:50px; color:#888; grid-column:1/-1; background:#f9f9f9; border-radius:10px;'>";
                    echo "<i class='fas fa-box-open' style='font-size:50px; margin-bottom:15px; color:#ddd;'></i><br>";
                    echo "<h3>Belum ada party yang dibuat.</h3>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    </div>
</body>
</html>