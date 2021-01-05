<?php
    require_once("koneksi/dbkoneksi.php");
    session_start();
    $peserta_id = $_SESSION['id_peserta'];
    $query = mysqli_query($con,"SELECT * FROM peserta WHERE id_peserta= $peserta_id ");
    $tanggal_sekarang = date('Y-m-d H:i:s');
    $offset = strtotime("+3 day");
    $enddate = date("Y-m-d H:i:s", $offset);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Langganan</title>
    <?php require_once("header.php") ?>
    <link rel="stylesheet" href="admin/assets/style.css">
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Daftar Langganan</h5>
            <div class="row">
                <div></div>
            </div>
            <form action="simpan-daftar-langganan.php" method="post">
                <?php while ($data_peserta = mysqli_fetch_array($query)) { ?>
                    <input type="text" name="id_peserta" class="form-control" value="<?php echo $data_peserta["id_peserta"] ?>" hidden>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data_peserta["nama"] ?>" hidden>
                    <input type="text" name="tanggal" class="form-control" value="<?php echo $tanggal_sekarang ?>" hidden>
                    <input type="text" name="batas_pembayaran" class="form-control" value="<?php echo $enddate ?>" hidden>
                <?php } ?>
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                              <center>Paket 1</center>
                            </div>
                            <div class="card-body">
                              <center>
                              Akses Penuh kelas Premium Selama 3 bulan, hanya
                              Rp 300.000,-
                              </center> 
                              <br>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="lama_langganan" id="lama_langganan1" value="91" checked>
                                <label class="form-check-label" for="lama_langganan1">Pilih Paket 1</label>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                              <center>Paket 2</center>
                            </div>
                            <div class="card-body">
                              <center>
                              Akses Penuh kelas Premium Selama 1 tahun, hanya
                              Rp 1.200.000,-
                              </center> 
                              <br>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="lama_langganan" id="lama_langganan2" value="360">
                                <label class="form-check-label" for="lama_langganan2">Pilih Paket 2</label>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="beli" type="submit">Beli</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php require_once("auth.php")?>