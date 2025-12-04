<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Party Baru - GT Wiki</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Style Konsisten dengan Dashboard */
        .form-container { 
            background: white; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
            border: 1px solid #eee;
        }
        
        /* PERBAIKAN 1: Memberi jarak antar grup form agar tidak mepet bawah */
        .form-group { 
            margin-bottom: 25px; 
        }
        
        .form-group label { 
            display: block; 
            margin-bottom: 8px; /* Jarak label ke input */
            font-weight: bold; 
            color: #2c3e50; 
        }
        
        .form-control { 
            width: 100%; 
            padding: 12px; /* Padding diperbesar sedikit agar teks lega */
            border: 1px solid #ddd; 
            border-radius: 5px;
            box-sizing: border-box; /* Agar padding tidak melebarkan kotak */
        }
        
        /* PERBAIKAN 2: Styling Dropdown Hero */
        .hero-select { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #ddd; 
            border-radius: 5px; 
            background: #f9f9f9;
            box-sizing: border-box;
            cursor: pointer;
        }

        /* Layout Grid untuk Hero tetap sama */
        .hero-grid-container {
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 20px;
            margin-top: 15px;
        }
        
        .btn-submit { 
            background-color: #008CBA; 
            color: white; 
            padding: 12px 25px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 14px;
        }
        .btn-submit:hover { background-color: #007bb5; }
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
            <li><a href="party_tampil.php" class="active"><i class="fas fa-arrow-left"></i> Kembali</a></li>
        </ul>
    </nav>

    <div class="container main-body">
        <section class="content" style="width: 100%;">
            <div class="form-container">
                <h2 style="border-bottom: 2px solid #eee; padding-bottom: 10px; margin-top: 0; color: #0e1a2b;">Racik Party Baru</h2>
                
                <form action="aksi/party_simpan.php" method="POST">
                    
                    <div class="form-group">
                        <label>Nama Party</label>
                        <input type="text" name="nama_party" class="form-control" required placeholder="Masukkan nama party...">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <input type="text" name="deskripsi" class="form-control" placeholder="Contoh: Strategi Colosseum...">
                    </div>

                    <h3 style="margin-top: 30px; margin-bottom: 15px; color: #0e1a2b; border-bottom: 1px solid #eee; padding-bottom: 5px;">Pilih Anggota Tim</h3>
                    
                    <div class="hero-grid-container">
                        <?php
                        include "config/koneksi.php";
                        $hero_data = $db->query("SELECT id_hero, nama_hero, elemen, role FROM hero ORDER BY nama_hero ASC");
                        
                        function generateHeroOptions($hero_query, $label, $num) {
                            echo "<div class='form-group'>";
                            echo "<label>Hero Slot $num</label>";
                            echo "<select name='$label' class='hero-select' required>";
                            echo "<option value=''>-- Pilih Hero --</option>";
                            
                            $hero_query->data_seek(0);
                            while($h = $hero_query->fetch_assoc()) {
                                echo "<option value='".$h['id_hero']."'>".$h['nama_hero']." (".$h['elemen'].")</option>";
                            }
                            echo "</select>";
                            echo "</div>";
                        }

                        generateHeroOptions($hero_data, "hero1", 1);
                        generateHeroOptions($hero_data, "hero2", 2);
                        generateHeroOptions($hero_data, "hero3", 3);
                        generateHeroOptions($hero_data, "hero4", 4);
                        ?>
                    </div>

                    <div style="margin-top: 20px; text-align: right; border-top: 1px solid #eee; padding-top: 20px;">
                        <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Simpan Party</button>
                    </div>

                </form>
            </div>
        </section>
    </div>
</body>
</html>