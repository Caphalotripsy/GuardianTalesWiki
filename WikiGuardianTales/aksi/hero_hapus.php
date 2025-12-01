<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$sql = "DELETE FROM hero WHERE id_hero='$id'";

if ($db->query($sql) === TRUE) {
    header("Location: ../hero_tampil.php");
} else {
    echo "Error deleting record: " . $db->error;
}
?>