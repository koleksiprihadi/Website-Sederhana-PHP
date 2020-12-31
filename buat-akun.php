<?php require_once("koneksi/dbkoneksi.php")?>
<?php
    if(isset($_POST['daftar'])){
        $sql = mysqli_query($con,"INSERT INTO `peserta` (`id_peserta`, `nama`, `nohp`, `status`, `email`, `password`) VALUES (NULL, '".$_POST["nama"]."', '".$_POST["nohp"]."', 'Belum Langganan', '".$_POST["email"]."', '".$_POST["password"]."');");  
             
        ?>
        <script>
            window.location = 'login.php';
        </script>

<?php } ?> 