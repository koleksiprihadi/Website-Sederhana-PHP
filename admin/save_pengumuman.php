<?php require_once("../koneksi/dbkoneksi.php")?>
<?php
    if(isset($_POST['judul'])){
        $sql = mysqli_query($con,"INSERT INTO `pengumuman` (`id_pengumuman`, `id_kursus`, `id_pengajar`, `judul`, `isi`) VALUES (NULL, '".$_POST["id_kursus"]."', '".$_POST["id_pengajar"]."', '".$_POST["judul"]."', '".$_POST["pengumuman"]."')");  
             
        ?>
        <script>
            window.location = '/finalproject/admin';
        </script>

<?php } ?> 