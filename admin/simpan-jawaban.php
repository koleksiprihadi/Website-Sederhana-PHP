<?php
    require_once("../koneksi/dbkoneksi.php");
    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con,"INSERT INTO `jawaban` (`id_jawaban`, `id_qna`, `tanggal`, `nama`, `jawaban`) VALUES (NULL, '".$_POST["id_qna"]."', '".$_POST["tanggal"]."', '".$_POST["nama"]."', '".$_POST["jawaban"]."');");
        $id = $_POST["id_qna"];
        header("Location: pengajar-jwb-qna.php?id=$id");
    } 
?>