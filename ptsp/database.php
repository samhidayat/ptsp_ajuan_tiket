<?php
# @Author: Alumni
# @Copyright: (c) MIN 2 KOTA SURABAYA
?>
<?php

$db_host = "localhost";
$db_user = "pendmas1_pemohon2";
$db_pass = "alya04052007";
$db_name = "pendmas1_pemohon1";

try {
    //create PDO connection
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}

// ambil data dari user yang login
function logged_admin () {
    global $db, $admin_login, $divisi, $id_admin;
    $sql = "SELECT * FROM admin, divisi WHERE admin.username = :username AND admin.divisi = divisi.id_divisi";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $admin_login);
    $stmt->execute();
    foreach ($stmt as $col) {
        $divisi = $col['nama_divisi'];
        $id_admin = $col['id_admin'];
    }
}
