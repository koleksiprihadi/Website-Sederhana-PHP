<?php require_once("../koneksi/dbkoneksi.php")?>
<?php

    $id_video = $_POST['id_video'];
    $nama = $_POST['nama'];
    $link = $_POST['link'];
    $id_kursus = $_POST['id_kursus'];
    $nama_kursus = $_POST['nama_kursus'];
?>
<?php
    if(isset($_POST['edit'])){
        $sql = mysqli_query($con,"UPDATE video SET nama='$nama' , link='$link' WHERE id_video='$id_video' ");        
        ?>
        <script>
            window.location = 'edit-kursus.php?idkursus=<?php echo $id_kursus ?>&namakursus=<?php echo $nama_kursus ?>';
        </script>

<?php } ?>
<?php
    if(isset($_POST['hapus'])){
        $sql = mysqli_query($con,"DELETE FROM `video` WHERE `video`.`id_video` = '$id_video'");        
        ?>
        <script>
            window.location = 'edit-kursus.php?idkursus=<?php echo $id_kursus ?>&namakursus=<?php echo $nama_kursus ?>';
        </script>

<?php } ?> 

