<?php 
    if(isset($_POST['id_kursus'])) {
        $id_qursus = $_POST['id_kursus'];
        $nama_kursus = $_POST['nama_kursus'];
        $id_pengajar = $_POST['id_pengajar'];
        setcookie('id', $id_qursus, time() + (86400 * 30), "/");
        setcookie('nama_kursus', $nama_kursus, time() + (86400 * 30), "/");
        setcookie('id_pengajar', $id_pengajar, time() + (86400 * 30), "/"); ?>
        
    <?php } ?>

<script>
    window.location = 'kursus.php';
</script>

