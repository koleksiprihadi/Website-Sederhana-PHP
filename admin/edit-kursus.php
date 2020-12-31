<?php 
    $id = $_GET['idkursus'];
    $nama = $_GET['namakursus'];
    require_once("../koneksi/dbkoneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus</title>
    <?php require_once("header.php") ?>
    <?php require_once("../header.php") ?>
</head>
<body>
    <div class="card text-white bg-dark mb-3">
        <div class="card-header">
                <a href="index.php"><h5 class="card-title"><- Back</h5></a>
                <div class="card-tools">
                  <h3><?php echo $nama; ?></h3>
                </div>
        </div>
    </div>
    <div class="container">
        <div class="callout callout-info">
            <table class="table">
                <caption><a href="#" data-toggle="modal" data-target="#tambahvideo">Tambah Video</a></caption>
                <thead>
                    <tr>
                        <th scope="col">edit</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $query = mysqli_query($con,"SELECT * FROM video WHERE id_kursus='$id'");
                    while ($list = mysqli_fetch_array($query)) {?> 
                        <tr>
                            <th scope="row"><a href="#" data-toggle="modal" data-target="#updatekursus<?php echo $list['id_video']; ?>"><i class="ion ion-clipboard mr-1"> Edit</a></i></th>
                            <td><?php echo $list['nama']; ?></td>
                            <td><?php echo $list['link']; ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal edit -->
    <?php $video_query = mysqli_query($con,"SELECT * FROM video WHERE id_kursus ='$id'");
     while ($list_modal_video = mysqli_fetch_array($video_query)) { ?>
    <div class="example-modal">
                                      <div id="updatekursus<?php echo $list_modal_video['id_video']; ?>" class="modal fade" role="dialog" style="display:none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h3 class="modal-title">Edit <?php echo $list_modal_video['nama']; ?></h3>
                                            </div>
                                            <div class="modal-body">
                                              <form action="edit-video-kursus.php" method="post" role="form">
                                                <?php
                                                $id_video = $list_modal_video['id_video'];
                                                $query = "SELECT * FROM video WHERE id_video='$id_video'";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Judul <span class="text-red">*</span></label>         
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Judul" value="<?php echo $row['nama']; ?>"></div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Link <span class="text-red">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="link" placeholder="link" value="<?php echo $row['link']; ?>"></div>
                                                  </div>
                                                </div>
                                                
                                                
                                                <div class="modal-footer">
                                                    <input type="text" name="id_kursus" value="<?php echo $id ?>" hidden>
                                                    <input type="text" name="nama_kursus" value="<?php echo $nama ?>" hidden>
                                                  <input type="text" name="id_video" value="<?php echo $row['id_video']; ?>" hidden>
                                                  <button type="submit" name="hapus" type="button" class="btn btn-danger pull-left">hapus</button>
                                                  <input type="submit" name="edit" class="btn btn-primary" value="Update">
                                                </div>
                                                <?php
                                                }
                                                ?>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <?php }?>
                                    <!-- Modal Tambah Video -->
                                    <div class="example-modal">
                                      <div id="tambahvideo" class="modal fade" role="dialog" style="display:none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h3 class="modal-title">Tambah Video</h3>
                                            </div>
                                            <div class="modal-body">
                                              <form action="tambah-video-kursus.php" method="post" role="form">
                                                        
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Judul <span class="text-red">*</span></label>         
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Judul"></div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Link <span class="text-red">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="link" placeholder="link"></div>
                                                  </div>
                                                </div>
                                                
                                                
                                                <div class="modal-footer">
                                                    <input type="text" name="id_kursus" value="<?php echo $id ?>" hidden>
                                                    <input type="text" name="nama_kursus" value="<?php echo $nama ?>" hidden>
                                                  <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                  <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
                                                </div>
                                                
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
</body>
</html>

