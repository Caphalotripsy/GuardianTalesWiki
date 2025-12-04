<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment List - Guardian Tales Wiki</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS Khusus Tabel Equipment */
        table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 15px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        th { background-color: #0e1a2b; color: #ffc107; padding: 15px; text-align: left; text-transform: uppercase; font-size: 13px; letter-spacing: 1px; }
        td { padding: 15px; border-bottom: 1px solid #f0f0f0; vertical-align: top; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background-color: #f9fcff; }
        
        .equip-img { width: 70px; height: 70px; border-radius: 8px; object-fit: contain; border: 1px solid #ddd; background: #f8f9fa; padding: 5px; }
        .equip-name { font-weight: bold; font-size: 16px; color: #d35400; margin-bottom: 5px; display: block;}
        
        .badge-type { 
            background-color: #2c3e50; color: white; 
            padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: bold;
            display: inline-block;
        }

        .desc-text { font-size: 14px; color: #555; line-height: 1.6; }
    </style>
</head>
<body>

    <header class="main-header">
        <div class="logo-area">
            <img src="img/logo_main_shield.jpg" alt="GT Logo" class="brand-logo">
            <div>
                <h1>GUARDIAN TALES WIKI</h1>
                <p>Wiki Guardian Tales dari C030324060</p>
            </div>
        </div>
    </header>

    <nav class="sticky-navbar">
        <ul class="nav-menu">
            <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="hero_tampil.php"><i class="fas fa-users"></i>Hero</a></li>
            <li><a href="equipment_tampil.php" class="active"><i class="fas fa-swords"></i> Equipment</a></li>
            <li><a href="party_tampil.php"><i class="fas fa-chess"></i> Pengaturan Party</a></li>
        </ul>
    </nav>

    <div class="container main-body">
        
        <aside class="sidebar-right">
            <div class="sidebar-widget">
                <h3><i class="fas fa-filter"></i> Filter Senjata</h3>
                <p style="font-size: 13px; margin-bottom: 15px;">Pilih kategori senjata:</p>
                
                <form action="equipment_tampil.php" method="GET">
                    
                    <div class="filter-group">
                        <label class="filter-label">Tipe Equipment</label>
                        <select name="tipe" class="filter-select">
                            <option value="">Tampilkan Semua</option>
                            
                            <option value="Single Sword" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Single Sword') echo 'selected'; ?>>Single Sword</option>
                            <option value="Two-Handed Sword" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Two-Handed Sword') echo 'selected'; ?>>Two-Handed Sword</option>
                            <option value="Gun" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Gun') echo 'selected'; ?>>Rifle / Gun</option>
                            <option value="Bow" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Bow') echo 'selected'; ?>>Bow</option>
                            <option value="Basket" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Basket') echo 'selected'; ?>>Basket</option>
                            <option value="Staff" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Staff') echo 'selected'; ?>>Staff</option>
                            <option value="Gloves" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Gloves') echo 'selected'; ?>>Gloves</option>
                            <option value="Claw" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Claw') echo 'selected'; ?>>Claw</option>
                            <option value="Shield" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Shield') echo 'selected'; ?>>Shield</option>
                            <option value="Accessory" <?php if(isset($_GET['tipe']) && $_GET['tipe'] == 'Accessory') echo 'selected'; ?>>Accessory</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-filter"><i class="fas fa-search"></i> Cari Senjata</button>
                    <a href="equipment_tampil.php" class="btn-reset">Reset Filter</a>
                </form>
            </div>
            
            <div class="sidebar-widget">
                <h3><i class="fas fa-info-circle"></i> Info</h3>
                <p style="font-size: 13px; line-height: 1.5; color: #666;">
                    Senjata Eksklusif (EX) memberikan skill tambahan jika digunakan oleh Hero yang sesuai.
                </p>
            </div>
        </aside>

        <section class="content">
            <div style="border-bottom: 2px solid #eee; margin-bottom: 20px; padding-bottom: 10px;">
                <h2 style="margin:0; color: #0e1a2b;">Daftar Persenjataan</h2>
                <p style="margin:5px 0 0; color: #666;">
                    <?php 
                        // Menampilkan teks dinamis sesuai filter
                        if(isset($_GET['tipe']) && $_GET['tipe'] != "") {
                            echo "Menampilkan kategori: <b>" . $_GET['tipe'] . "</b>";
                        } else {
                            echo "Menampilkan semua koleksi senjata eksklusif.";
                        }
                    ?>
                </p>
            </div>

            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th width="100">Foto</th>
                            <th width="200">Nama & Tipe</th>
                            <th>Deskripsi Efek</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config/koneksi.php";
                        
                        // --- LOGIC FILTERING ---
                        $sql = "SELECT * FROM equipment";
                        
                        // Jika ada filter 'tipe' di URL
                        if(isset($_GET['tipe']) && $_GET['tipe'] != "") {
                            $tipe_filter = $_GET['tipe'];
                            $sql .= " WHERE tipe = '$tipe_filter'";
                        }
                        
                        $sql .= " ORDER BY nama_senjata ASC";
                        
                        $hasil = $db->query($sql);
                        
                        if ($hasil->num_rows > 0) {
                            while ($d = $hasil->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php if(!empty($d['gambar'])): ?>
                                    <img src="img/<?php echo $d['gambar']; ?>" class="equip-img">
                                <?php else: ?>
                                    <div class="equip-img" style="display:flex; align-items:center; justify-content:center; font-size:30px; color:#ccc;">
                                        <i class="fas fa-khanda"></i>
                                    </div>
                                <?php endif; ?>
                            </td>

                            <td>
                                <span class="equip-name"><?php echo $d['nama_senjata']; ?></span>
                                <span class="badge-type"><?php echo $d['tipe']; ?></span>
                            </td>

                            <td>
                                <p class="desc-text">
                                    <?php echo $d['deskripsi']; ?>
                                </p>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } else {
                            echo "<tr><td colspan='3' style='text-align:center; padding: 40px; color:#888;'>Tidak ada senjata ditemukan untuk kategori ini.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</body>
</html>