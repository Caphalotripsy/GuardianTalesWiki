<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Hero - Guardian Tales Wiki</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS Tabel */
        table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 15px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        th { background-color: #0e1a2b; color: #ffc107; padding: 15px; text-align: left; text-transform: uppercase; font-size: 13px; letter-spacing: 1px; }
        td { padding: 15px; border-bottom: 1px solid #f0f0f0; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background-color: #f9fcff; }
        
        .hero-avatar { width: 60px; height: 60px; border-radius: 10px; object-fit: cover; border: 2px solid #eee; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .hero-name { font-weight: bold; font-size: 16px; color: #2c3e50; }
        
        /* Badge Elements */
        .badge { padding: 6px 12px; border-radius: 20px; font-size: 11px; font-weight: bold; color: white; display: inline-block; min-width: 60px; text-align: center; }
        .bg-dark { background-color: #6a1b9a; }
        .bg-light { background-color: #fbc02d; color: #333; }
        .bg-fire { background-color: #d32f2f; }
        .bg-water { background-color: #0288d1; }
        .bg-earth { background-color: #388e3c; }
        .bg-basic { background-color: #757575; }

        /* Badge Weapon */
        .badge-weapon { 
            background-color: #ecf0f1; color: #2c3e50; border: 1px solid #bdc3c7;
            padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: 600;
            display: inline-flex; align-items: center; gap: 5px;
        }

        .btn-detail {
            background-color: #008CBA; color: white; padding: 8px 15px; 
            border-radius: 5px; text-decoration: none; font-size: 13px; font-weight: bold;
            transition: 0.3s; display: inline-block;
        }
        .btn-detail:hover { background-color: #005f7f; transform: translateY(-2px); }
    </style>
</head>
<body>

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
            
            <li><a href="hero_tampil.php" class="active"><i class="fas fa-users"></i> Database Hero</a></li>
            
            <li><a href="equipment_tampil.php"><i class="fas fa-swords"></i> Equipment</a></li>
            <li><a href="#"><i class="fas fa-book"></i> Guides</a></li>
        </ul>
    </nav>

    <div class="container main-body">
        
        <aside class="sidebar-right">
            <div class="sidebar-widget">
                <h3><i class="fas fa-filter"></i> Filter Hero</h3>
                <p style="font-size: 13px; margin-bottom: 15px;">Tampilkan hero sesuai kriteria:</p>
                
                <form action="hero_tampil.php" method="GET">
                    
                    <div class="filter-group">
                        <label class="filter-label">Elemen</label>
                        
                        <div style="margin-bottom: 8px;">
                            <label style="font-size:12px; cursor:pointer;">
                                <input type="radio" name="elemen" value="" <?php if(empty($_GET['elemen'])) echo 'checked'; ?> style="margin-right:5px;"> 
                                Semua Elemen
                            </label>
                        </div>

                        <div class="element-grid">
                            <div class="element-option">
                                <input type="radio" id="el_basic" name="elemen" value="Basic" <?php if(isset($_GET['elemen']) && $_GET['elemen'] == 'Basic') echo 'checked'; ?>>
                                <label for="el_basic"><img src="img/elem_basic.png" alt="Basic"><span>Basic</span></label>
                            </div>
                            <div class="element-option">
                                <input type="radio" id="el_light" name="elemen" value="Light" <?php if(isset($_GET['elemen']) && $_GET['elemen'] == 'Light') echo 'checked'; ?>>
                                <label for="el_light"><img src="img/elem_light.png" alt="Light"><span>Light</span></label>
                            </div>
                            <div class="element-option">
                                <input type="radio" id="el_dark" name="elemen" value="Dark" <?php if(isset($_GET['elemen']) && $_GET['elemen'] == 'Dark') echo 'checked'; ?>>
                                <label for="el_dark"><img src="img/elem_dark.png" alt="Dark"><span>Dark</span></label>
                            </div>
                            <div class="element-option">
                                <input type="radio" id="el_fire" name="elemen" value="Fire" <?php if(isset($_GET['elemen']) && $_GET['elemen'] == 'Fire') echo 'checked'; ?>>
                                <label for="el_fire"><img src="img/elem_fire.png" alt="Fire"><span>Fire</span></label>
                            </div>
                            <div class="element-option">
                                <input type="radio" id="el_water" name="elemen" value="Water" <?php if(isset($_GET['elemen']) && $_GET['elemen'] == 'Water') echo 'checked'; ?>>
                                <label for="el_water"><img src="img/elem_water.png" alt="Water"><span>Water</span></label>
                            </div>
                            <div class="element-option">
                                <input type="radio" id="el_earth" name="elemen" value="Earth" <?php if(isset($_GET['elemen']) && $_GET['elemen'] == 'Earth') echo 'checked'; ?>>
                                <label for="el_earth"><img src="img/elem_earth.png" alt="Earth"><span>Earth</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">Role</label>
                        <select name="role" class="filter-select">
                            <option value="">Semua Role</option>
                            <option value="Tank" <?php if(isset($_GET['role']) && $_GET['role'] == 'Tank') echo 'selected'; ?>>Tank</option>
                            <option value="Warrior" <?php if(isset($_GET['role']) && $_GET['role'] == 'Warrior') echo 'selected'; ?>>Warrior</option>
                            <option value="Ranged" <?php if(isset($_GET['role']) && $_GET['role'] == 'Ranged') echo 'selected'; ?>>Ranged</option>
                            <option value="Support" <?php if(isset($_GET['role']) && $_GET['role'] == 'Support') echo 'selected'; ?>>Support</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">Tipe Senjata</label>
                        <select name="senjata" class="filter-select">
                            <option value="">Semua Senjata</option>
                            <option value="Single Sword" <?php if(isset($_GET['senjata']) && $_GET['senjata'] == 'Single Sword') echo 'selected'; ?>>Single Sword</option>
                            <option value="Two-Handed Sword" <?php if(isset($_GET['senjata']) && $_GET['senjata'] == 'Two-Handed Sword') echo 'selected'; ?>>Two-Handed Sword</option>
                            <option value="Gun" <?php if(isset($_GET['senjata']) && $_GET['senjata'] == 'Gun') echo 'selected'; ?>>Gun</option>
                            <option value="Bow" <?php if(isset($_GET['senjata']) && $_GET['senjata'] == 'Bow') echo 'selected'; ?>>Bow</option>
                            <option value="Basket" <?php if(isset($_GET['senjata']) && $_GET['senjata'] == 'Basket') echo 'selected'; ?>>Basket</option>
                            <option value="Staff" <?php if(isset($_GET['senjata']) && $_GET['senjata'] == 'Staff') echo 'selected'; ?>>Staff</option>
                            <option value="Gloves" <?php if(isset($_GET['senjata']) && $_GET['senjata'] == 'Gloves') echo 'selected'; ?>>Gloves</option>
                            <option value="Claw" <?php if(isset($_GET['senjata']) && $_GET['senjata'] == 'Claw') echo 'selected'; ?>>Claw</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-filter"><i class="fas fa-search"></i> Terapkan Filter</button>
                    <a href="hero_tampil.php" class="btn-reset">Reset Filter</a>
                </form>
            </div>
        </aside>

        <section class="content">
            <div style="border-bottom: 2px solid #eee; margin-bottom: 20px; padding-bottom: 10px;">
                <h2 style="margin:0; color: #0e1a2b;">Daftar Hero</h2>
                <p style="margin:5px 0 0; color: #666;">
                    Menampilkan daftar hero berdasarkan filter yang Anda pilih.
                </p>
            </div>

            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th width="80">Foto</th>
                            <th>Nama Hero</th>
                            <th>Elemen</th>
                            <th>Role</th>
                            <th>Senjata</th>
                            <th width="100">Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config/koneksi.php";

                        // --- LOGIC FILTERING ---
                        $sql = "SELECT * FROM hero";
                        $conditions = [];

                        if (!empty($_GET['elemen'])) {
                            $elemen_filter = $_GET['elemen'];
                            $conditions[] = "elemen = '$elemen_filter'";
                        }
                        if (!empty($_GET['role'])) {
                            $role_filter = $_GET['role'];
                            $conditions[] = "role = '$role_filter'";
                        }
                        if (!empty($_GET['senjata'])) {
                            $senjata_filter = $_GET['senjata'];
                            $conditions[] = "tipe_senjata = '$senjata_filter'";
                        }

                        if (count($conditions) > 0) {
                            $sql .= " WHERE " . implode(' AND ', $conditions);
                        }

                        $sql .= " ORDER BY nama_hero ASC";
                        $hasil = $db->query($sql);
                        
                        if ($hasil->num_rows > 0) {
                            while ($d = $hasil->fetch_assoc()) {
                                $badge_class = 'bg-basic';
                                if($d['elemen'] == 'Dark') $badge_class = 'bg-dark';
                                if($d['elemen'] == 'Light') $badge_class = 'bg-light';
                                if($d['elemen'] == 'Fire') $badge_class = 'bg-fire';
                                if($d['elemen'] == 'Water') $badge_class = 'bg-water';
                                if($d['elemen'] == 'Earth') $badge_class = 'bg-earth';

                                $senjata = !empty($d['tipe_senjata']) ? $d['tipe_senjata'] : '-';
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
                                <span class="badge-weapon">
                                    <i class="fas fa-khanda"></i> <?php echo $senjata; ?>
                                </span>
                            </td>
                            <td>
                                <a href="hero_detail.php?id=<?php echo $d['id_hero']; ?>" class="btn-detail">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } else {
                            echo "<tr><td colspan='6' style='text-align:center; padding: 30px; color:#888;'>Tidak ada hero yang cocok dengan filter ini.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</body>
</html>