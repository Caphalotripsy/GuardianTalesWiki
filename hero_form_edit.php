<?php
include "config/koneksi.php";
$id = $_GET['id'];
$ambil = $db->query("SELECT * FROM hero WHERE id_hero='$id'");
$data = $ambil->fetch_assoc();
?>
<html>
<head><title>Edit Hero</title></head>
<body>
    <h2>Edit Data Hero</h2>
    <form action="aksi/hero_edit_simpan.php" method="POST">
        <input type="hidden" name="id_hero" value="<?php echo $data['id_hero']; ?>">
        <table>
            <tr><td>Nama Hero</td><td><input type="text" name="nama_hero" value="<?php echo $data['nama_hero']; ?>"></td></tr>
            <tr><td>Elemen</td><td>
                <select name="elemen">
                    <option value="Basic" <?php if($data['elemen']=='Basic') echo 'selected'; ?>>Basic</option>
                    <option value="Light" <?php if($data['elemen']=='Light') echo 'selected'; ?>>Light</option>
                    <option value="Dark" <?php if($data['elemen']=='Dark') echo 'selected'; ?>>Dark</option>
                    <option value="Fire" <?php if($data['elemen']=='Fire') echo 'selected'; ?>>Fire</option>
                    <option value="Water" <?php if($data['elemen']=='Water') echo 'selected'; ?>>Water</option>
                    <option value="Earth" <?php if($data['elemen']=='Earth') echo 'selected'; ?>>Earth</option>
                </select>
            </td></tr>
            <tr><td>Role</td><td>
                <input type="text" name="role" value="<?php echo $data['role']; ?>"> (Gunakan Radio button jika ingin lebih rapi)
            </td></tr>
            <tr><td>Party Buff</td><td><input type="text" name="party_buff" value="<?php echo $data['party_buff']; ?>"></td></tr>
            <tr><td></td><td><input type="submit" value="Update Hero"></td></tr>
        </table>
    </form>
</body>
</html>