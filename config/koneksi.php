<?php
// File: config/koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "db_guardian_tales";

$db = new mysqli($host, $user, $pass, $db_name);

if ($db->connect_errno > 0) {
    die("Koneksi Database Gagal: " . $db->connect_error);
}
?>