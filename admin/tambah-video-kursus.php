<?php
    $nama_kursus = $_POST['nama_kursus'];
    $id = $_POST["id_kursus"];
    require_once("../koneksi/dbkoneksi.php");
    if (isset($_POST['tambah'])) {
        $sql = mysqli_query($con,"INSERT INTO `video` (`id_video`, `id_kursus`, `nama`, `link`) VALUES (NULL, '".$_POST["id_kursus"]."', '".$_POST["nama"]."', '".$_POST["link"]."');");
        header("Location: edit-kursus.php?idkursus=$id&namakursus=$nama_kursus");
    } 
?>
