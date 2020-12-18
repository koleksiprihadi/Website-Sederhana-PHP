<?php require_once("../koneksi/dbkoneksi.php")?>
<?php
$id = $_GET["id"];
$sql = mysqli_query($con,"DELETE FROM `pengumuman` WHERE `pengumuman`.`id_pengumuman` = $id");
?>
<script>
    window.location = '/finalproject/admin';
</script>