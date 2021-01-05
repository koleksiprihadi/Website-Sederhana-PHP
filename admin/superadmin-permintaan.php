<?php require_once("../koneksi/dbkoneksi.php")?>
<?php
                            $id = $_SESSION['id_pengajar'];
                            $query = mysqli_query($con,"SELECT * FROM invoice WHERE status='Belum Lunas' and tgl_bayar IS NOT NULL");
                            while ($list_bayar = mysqli_fetch_array($query)) { ?>
                            <div class="card-body">   
                                <div class="callout callout-info">
                                    <h5><?php echo $list_bayar['nama']; ?>                                      
                                      <span class="badge badge-warning"><a href="#" data-toggle="modal" data-target="#bayar<?php echo $list_bayar['id_req'];  ?>">Lihat</a></span>
                                      <span class="badge badge-primary"><a href="lunas.php?id=<?php echo $list_bayar['id_req']; ?>">Lunas</a></span>
                                    </h5>                                   

                                </div>                            
                            </div>
                        <?php } ?>
<?php
                $modal_query = mysqli_query($con,"SELECT * FROM invoice WHERE tgl_bayar IS NOT NULL");
                 while ($list_modal = mysqli_fetch_array($modal_query)) { ?>
                <div class="example-modal">
                                      <div id="bayar<?php echo $list_modal['id_req']; ?>" class="modal fade" role="dialog" style="display:none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h3 class="modal-title">Bukti Pembayaran</h3>
                                            </div>
                                            <div class="modal-body">
                                              <form action="edit-pengumuman.php?act=updateuser" method="post" role="form">
                                                <?php
                                                $id_gambar = $list_modal['id_req'];
                                                $query = "SELECT * FROM invoice WHERE id_req='$id_gambar'";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                   <h1>Tagihan : <?php echo $list_modal['harga']; ?></h1>                                         
                                                <img src="../assets/img/<?php echo $list_modal['upload_pembayaran']; ?>" Height="200px" alt="">
                                                <div class="modal-footer">
                    
                                                  <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Keluar</button>
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