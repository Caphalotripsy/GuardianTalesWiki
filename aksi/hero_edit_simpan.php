<?php
include "../config/koneksi.php";

$id = $_POST['id_hero'];
$nama = $_POST['nama_hero'];
$elemen = $_POST['elemen'];
$role = $_POST['role'];
$buff = $_POST['party_buff'];

$sql = "UPDATE hero SET 
        nama_hero='$nama', 
        elemen='$elemen', 
        role='$role', 
        party_buff='$buff' 
        WHERE id_hero='$id'";

if ($db->query($sql) === TRUE) {
    header("Location: ../hero_tampil.php");
} else {
    echo "Error update: " . $db->error;
}
?>