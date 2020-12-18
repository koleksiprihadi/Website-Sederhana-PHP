<?php require_once("../koneksi/dbkoneksi.php")?>
<?php
    if(isset($_POST['judul'])){
        $sql = mysqli_query($con,"INSERT INTO `pengumuman` (`id_pengumuman`, `id_kursus`, `judul`, `isi`) VALUES (NULL, '1', '".$_POST["judul"]."', '".$_POST["pengumuman"]."')");        
        ?>
        <script>
            alert("data Berhasil ditambah");
            window.location = '/finalproject/admin';
        </script>

<?php } ?> 