<?php 
    require_once("../koneksi/dbkoneksi.php");
    session_start();
    if ($_SESSION['session'] == false){
        header("Location: login-admin.php");}
    $id = $_GET['id'];
    $id_pengajar = $_SESSION['id_pengajar'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menjawab</title>
    <?php require_once("../header.php") ?>
</head>
<body>
    <div class="card text-white bg-dark mb-3">
        <div class="card-header">
            <a href="index.php"><h5 class="card-title"><- Back</h5></a>
        </div>
    </div>
    <?php $query_pertanyaan = mysqli_query($con,"SELECT * FROM qna WHERE id_qna = '$id'");
     while ($pertanyaan = mysqli_fetch_array($query_pertanyaan)) { ?>
    <div class="callout callout-info">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">
                <h1 class="card-title"><?php echo $pertanyaan['pertanyaan'];?></h1>
                <p>Oleh : <?php echo $pertanyaan['nama'];?></p>
                <p>Topik : <?php echo $pertanyaan['Topic'];?></p>
            </div>
            <div class="card-body">
                <div class="card-text"><?php echo $pertanyaan['detail'];?></div>
            </div>
        </div>
    </div>
    <?php } ?>
<?php
    $query_jawaban = mysqli_query($con,"SELECT * FROM jawaban WHERE id_qna = '$id'");
     while ($list_jawaban = mysqli_fetch_array($query_jawaban)) { ?>
        <div class="card-body" style="posisition: center;">   
            <div class="callout callout-info">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header"><h5><?php echo $list_jawaban['nama'];?></h5></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $list_jawaban['jawaban'];?></h5>
                            <p class="card-text"><?php echo $list_jawaban['tanggal'];?></p>
                        </div>
                        
                </div>              
            </div>                            
        </div>
<?php } ?>
</body>
</html>

<?php 
    $tanggal = date('Y-m-d');
    $nama = $_SESSION['nama_pengajar'];
?>
<div class="container">
    <form action="simpan-jawaban.php" method="post" >
        <input type="text" class="form-control" name="id_qna" id="id_qna" value='<?php echo $id ?>' hidden>
        <input type="text" class="form-control" name="tanggal" id="tanggal" value='<?php echo $tanggal ?>' hidden>
        <input type="text" class="form-control" name="nama" id="nama" value='<?php echo $nama ?>' readonly>
        <textarea name="jawaban" id="jawaban" class="form-control" placeholder="Jawaban Anda" cols="30" rows="5"></textarea>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
