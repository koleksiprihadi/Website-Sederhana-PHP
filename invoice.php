<?php $id = $_GET['id']; ?>
<?php require_once("koneksi/dbkoneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <?php require_once("header.php"); $hari = date('l, d-m-Y'); ?>
</head>
<body>
<div class="container">
<?php $query_invoice = mysqli_query($con,"SELECT * FROM invoice WHERE id_peserta = '$id' ORDER BY id_req DESC");
     while ($invoice = mysqli_fetch_array($query_invoice)) { ?>
    <div class="callout callout-info">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col"><h1 class="card-title rata-kanan">INVOICE</h1></div>
                    <div class="col"><h1 class="card-title rata-kanan" style="text-align: right;"><?php echo $invoice['status'];?></h1></div>
                </div>               
            </div>
            <div class="card-body">
                <div class="card-text">
                    <div class="row">
                        <div class="col">
                            Nama                : <?php echo $invoice['nama'];?> <br>
                            Langganan Hingga    : <?php echo $invoice['lama_langganan'];?> <br>
                            Batas Pembayaran    : <?php echo $invoice['batas_pembayaran'];?> <br>
                        </div>
                        <div class="col" style="text-align: right;"><?php echo $invoice['tanggal'];?></div>
                    </div>
                    <center>
                        Total
                        <h1><?php echo $invoice['harga'];?></h1>                        
                    </center>
                </div>
                <?php 
                    $a = $invoice['upload_pembayaran'];
                    $batas = $invoice['batas_pembayaran'];;
                    $expire = strtotime($batas);
                    $hariini = strtotime("today midnight");
                    if($a == 'belumlunas.png' and $hariini <= $expire){ ?>
                        <form action="invoice.php?id=<?php echo $invoice['id_peserta'];?>&invoice=<?php echo $invoice['id_req']; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="upload">Upload Bukti Pembayaran</label>
                                <input type="file" name="upload_pembayaran" class="form-control-file" id="upload">
                                <input type="submit" name="kirim" value="Kirim">
                            </div>
                        </form>
                    <?php } ?>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col"><img src="assets/img/<?php echo $invoice['upload_pembayaran'];?>" height="200px" alt=""></div>
                    <div class="col" style="text-align: right;">
                        Tanggal Bayar   : <?php echo $invoice['tgl_bayar'];?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</body>
</html>

<?php
    if (isset($_POST['kirim'])) {
        $image = $_FILES['upload_pembayaran']['name'];
        move_uploaded_file($_FILES['upload_pembayaran']['tmp_name'], "assets/img/".$image);
        $invoice = $_GET['invoice'];
        $sql = mysqli_query($con,"UPDATE `invoice` SET `upload_pembayaran` = '$image', `tgl_bayar` = '$hari' WHERE `invoice`.`id_req` = $invoice;");?>
        <script>
            window.location = 'invoice.php?id=<?php echo $id ?>';
        </script>
    <?php }
?>
