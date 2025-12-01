<?php
include "../config/koneksi.php";

$nama = $_POST['nama_hero'];
$elemen = $_POST['elemen'];
$role = $_POST['role'];
$buff = $_POST['party_buff'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT INTO hero (nama_hero, elemen, role, party_buff, deskripsi) 
        VALUES ('$nama', '$elemen', '$role', '$buff', '$deskripsi')";

if ($db->query($sql) === TRUE) {
    header("Location: ../hero_tampil.php"); // Redirect kembali ke halaman utama
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
?>