<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Pengumuman-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-bell"></i>
                  Pengumuman
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#lihat" data-toggle="tab">Lihat</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#buat" data-toggle="tab">Buat</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body card-outline">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="lihat" style="position: relative; height: 300px; overflow:scroll;">
                      <h5>Lihat</h5>
                        <?php
                            $id = $_SESSION['id_pengajar'];
                            $query = mysqli_query($con,"SELECT * FROM pengumuman WHERE id_pengajar='$id'");
                            while ($list_pengumuman = mysqli_fetch_array($query)) { ?>
                            <div class="card-body">   
                                <div class="callout callout-info">
                                    <h5><?php echo $list_pengumuman['judul']; ?>
                                      <span class="badge badge-danger"><a href="hapus-pengumuman.php?id=<?php echo $list_pengumuman['id_pengumuman']; ?>">Hapus</a></span>
                                      
                                      <span class="badge badge-warning"><a href="#" data-toggle="modal" data-target="#updateuser<?php echo $list_pengumuman['id_pengumuman'];  ?>">Edit</a></span>
                                    </h5>
                                    <p><?php echo $list_pengumuman['isi']; ?></p>
                                    

                                </div>                            
                            </div>
                        <?php } ?>
                   </div>
                  <div class="chart tab-pane" id="buat" style="position: relative; height: 300px;">
                    <h5>Buat <?php echo $_SESSION['id_pengajar'];?></h5>
                    <form action="save_pengumuman.php" method="post">
                    <div class="row">
                          <div class="col">
                          <select class="custom-select my-1 mr-sm-2" id="id_kursus" name="id_kursus">
                            
                            <?php
                            echo $nama;
                            $option_query = mysqli_query($con,"SELECT * FROM kursus WHERE pengajar='$id'");
                            while ($list_kursus = mysqli_fetch_array($option_query)) { ?>
                            <option value='<?php echo $list_kursus['id_kursus'];?>'><?php echo $list_kursus['nama'];?></option>
                            <?php } ?>
                          </select>
                          
                          </div>
                          <div class="col">
                          <input type="text" class="form-control" name="id_pengajar" id="id_pengajar" value='<?php echo $id ?>' hidden>
                            <input type="text" class="form-control" placeholder="Judul" name="judul" id="judul">
                          </div>
                        </div>
                        
                        <textarea name="pengumuman" id="pengumuman" class="form-control" placeholder="Judul" cols="30" rows="5"></textarea>
                        <input type="submit" class="btn btn-primary">
                    </form>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>

            <!-- /.card -->
            <?php
                  $modal_query = mysqli_query($con,"SELECT * FROM pengumuman");
                 while ($list_modal = mysqli_fetch_array($modal_query)) { ?>
                <div class="example-modal">
                                      <div id="updateuser<?php echo $list_modal['id_pengumuman']; ?>" class="modal fade" role="dialog" style="display:none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h3 class="modal-title">Edit Pengumuman</h3>
                                            </div>
                                            <div class="modal-body">
                                              <form action="edit-pengumuman.php?act=updateuser" method="post" role="form">
                                                <?php
                                                $id_pengumuman = $list_modal['id_pengumuman'];
                                                $query = "SELECT * FROM pengumuman WHERE id_pengumuman='$id_pengumuman'";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Judul <span class="text-red">*</span></label>         
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="judul" placeholder="Judul" value="<?php echo $row['judul']; ?>"></div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Isi <span class="text-red">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="isi" placeholder="Username" value="<?php echo $row['isi']; ?>"></div>
                                                  </div>
                                                </div>
                                                
                                                
                                                <div class="modal-footer">
                                                  <input type="text" name="id_pengumuman" value="<?php echo $row['id_pengumuman']; ?>" hidden>
                                                  <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                  <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                </div>
                                                <?php
                                                }
                                                ?>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div><!-- modal update user -->


                 <?php }?>
            
            <!-- QnA -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  QnA
                </h3>
              </div>
              <div class="card-body" style="position: relative; height: 300px; overflow:scroll;">
              <?php $qna_query = mysqli_query($con,"SELECT * FROM qna WHERE id_pengajar ='$id' ");
              while ($list_qna = mysqli_fetch_array($qna_query)) { ?>
              <div class="callout callout-info">
                  <h5><a href="pengajar-jwb-qna.php?id=<?php echo $list_qna['id_qna']; ?>"><?php echo $list_qna['pertanyaan']; ?></a></h5>
                  <p><?php echo $list_qna['Topic']; ?></p>
              </div>
              <?php } ?>
              </div>
            </div>
            
            

            
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <div class='card'>
              <div class='card-header'>
                <h3 class="card-title">Kursus Ku</h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="#">Tambah Kursus</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class='card-body'>
                <?php
                  $kursusku_query = mysqli_query($con,"SELECT * FROM kursus WHERE pengajar ='$id' ");
                  while ($list_kursus = mysqli_fetch_array($kursusku_query)) { ?>
                  <div class="card-body">   
                                <div class="callout callout-info">
                                    <h5>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    <a href="edit-kursus.php?idkursus=<?php echo $list_kursus['id_kursus']; ?>&namakursus=<?php echo $list_kursus['nama']; ?>"><?php echo $list_kursus['nama']; ?></a>
                                    </h5>
                                </div>                            
                            </div>
                  <?php } ?>
              </div>
            </div>          

            <!-- Calendar -->
            
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->