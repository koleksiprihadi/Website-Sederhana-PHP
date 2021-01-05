<?php require_once("../koneksi/dbkoneksi.php")?>
<?php
    $invoice = $_GET['id'];
    $sql = mysqli_query($con,"UPDATE `invoice` SET `status` = 'Lunas' WHERE `invoice`.`id_req` = $invoice;");
    header("Location: superadmin.php");
?>