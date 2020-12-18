<?php
    $id = $_COOKIE['id'];
    $query = mysqli_query($con,"SELECT * FROM pengumuman WHERE id_kursus = $id");
     while ($list_pengumuman = mysqli_fetch_array($query)) { ?>
        <div class="card-body">   
            <div class="callout callout-info">
                <h5><?php echo $list_pengumuman['judul']; ?></h5>

                <p><?php echo $list_pengumuman['isi']; ?></p>
            </div>                            
        </div>
<?php } ?>