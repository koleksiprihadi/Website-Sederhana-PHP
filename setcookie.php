<?php 
    if(isset($_POST['id_kursus'])) {
        $id_qursus = $_POST['id_kursus'];
        setcookie('id', $id_qursus, time() + (86400 * 30), "/"); ?>
        
    <?php } ?>

<script>
    window.location = 'kursus.php';
</script>

