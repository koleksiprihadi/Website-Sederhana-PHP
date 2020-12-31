<?php require_once("../koneksi/dbkoneksi.php")?>
<?php

    $id_pengumuman = $_POST['id_pengumuman'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
?>
<?php
    if(isset($_POST['judul'])){
        $sql = mysqli_query($con,"UPDATE pengumuman SET judul='$judul' , isi='$isi' WHERE id_pengumuman='$id_pengumuman' ");        
        ?>
        <script>
            window.location = '/finalproject/admin';
        </script>

<?php } ?> 