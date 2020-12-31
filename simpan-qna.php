<?php require_once("koneksi/dbkoneksi.php")?>
<?php
    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con,"INSERT INTO `qna` (`id_qna`, `id_kursus`, `id_pengajar`, `id_peserta`, `nama`, `pertanyaan`, `detail`, `Topic`) VALUES (NULL, '".$_POST["id_kursus"]."', '".$_POST["id_pengajar"]."', '".$_POST["id_peserta"]."', '".$_POST["nama"]."', '".$_POST["qna_judul"]."', '".$_POST["qna_isi"]."', '".$_POST["nama_kursus"]."');");
    }
?>
<script>
     window.location = 'kursus.php';
</script>