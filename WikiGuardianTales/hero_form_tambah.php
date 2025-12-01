<html>
<head><title>Tambah Hero - GT Wiki</title></head>
<body>
    <h2>Tambah Hero Baru</h2>
    <form action="aksi/hero_tambah.php" method="POST">
        <table>
            <tr><td>Nama Hero</td><td><input type="text" name="nama_hero" required></td></tr>
            <tr><td>Elemen</td><td>
                <select name="elemen">
                    <option value="Basic">Basic</option>
                    <option value="Light">Light</option>
                    <option value="Dark">Dark</option>
                    <option value="Fire">Fire</option>
                    <option value="Water">Water</option>
                    <option value="Earth">Earth</option>
                </select>
            </td></tr>
            <tr><td>Role</td><td>
                <input type="radio" name="role" value="Tank"> Tank
                <input type="radio" name="role" value="Warrior"> Warrior
                <input type="radio" name="role" value="Ranged"> Ranged
                <input type="radio" name="role" value="Support"> Support
            </td></tr>
            <tr><td>Party Buff</td><td><input type="text" name="party_buff"></td></tr>
            <tr><td>Deskripsi</td><td><textarea name="deskripsi" rows="4"></textarea></td></tr>
            <tr><td></td><td><input type="submit" value="Simpan Hero"></td></tr>
        </table>
    </form>
    <a href="hero_tampil.php">Kembali</a>
</body>
</html>