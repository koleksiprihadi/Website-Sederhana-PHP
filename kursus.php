<?php
session_start();
if ($_SESSION['status'] == false){
    header("Location: discover.php");
}?>
<?php require_once("koneksi/dbkoneksi.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php require_once("header.php") ?>
</head>
<body>
    <div class="row">
        <div class="col-sm-9">
            <div class="container">
                <div class="embed-responsive embed-responsive-16by9 kursus">
                    <iframe class="embed-responsive-item" src="<?php echo $_GET["id_kursus"];?>" title="asdfg" allowfullscreen></iframe>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail kursus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="qna-tab" data-toggle="tab" href="#qna" role="tab" aria-controls="qna" aria-selected="false">QnA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pengumuman-tab" data-toggle="tab" href="#pengumuman" role="tab" aria-controls="pengumuman" aria-selected="false">Pengumuman</a>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">A</div>
                <div class="tab-pane fade" id="qna" role="tabpanel" aria-labelledby="qna-tab"><?php require_once("qna.php"); ?></div>
                <div class="tab-pane fade" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab"><?php require_once("pengumuman.php"); ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="">
                <?php
                $kursus_id = $_COOKIE['id'];
                $query = mysqli_query($con,"SELECT * FROM video WHERE id_kursus= $kursus_id ");
                while ($record = mysqli_fetch_array($query)) { ?>
                    <div class="kursus">
                        <form method="get">
                            <input type="text" name="pengajar" value="<?php echo $record['pengajar']; ?>"hidden>
                            <input type="text" name="id_kursus" value="<?php echo $record['link']; ?>"hidden>
                            <input type="submit" name="id" value="<?php echo $record['nama']; ?>" class="btn">
                        </form>
                    </div>
                <?php } ?>
            
            </div>
        </div>
    </div>
    
</body>
</html>

