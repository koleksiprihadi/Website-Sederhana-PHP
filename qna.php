<?php 
    $id = $_COOKIE['id'];
    $nama_kursus = $_COOKIE['nama_kursus'];
    $id_pengajar = $_COOKIE['id_pengajar'];
    $nama = $_SESSION['nama'];
    $id_peserta =$_SESSION['id_peserta']; 
?>
<form action="simpan-qna.php" method="post">
    <input type="text" class="form-control" name="nama_kursus" id="nama_kursus" value='<?php echo $nama_kursus ?>' hidden>
    <input type="text" class="form-control" name="id_kursus" id="id_kursus" value='<?php echo $id ?>' hidden>
    <input type="text" class="form-control" name="id_pengajar" id="id_pengajar" value='<?php echo $id_pengajar ?>' hidden>
    <input type="text" class="form-control" name="id_peserta" id="id_peserta" value='<?php echo $id_peserta ?>' hidden>
    <input type="text" class="form-control" name="nama" id="nama" value='<?php echo $nama ?>' readonly>
    <input type="text" class="form-control" name="qna_judul" id="qna_judul" placeholder="Pertanyaan">
    <textarea name="qna_isi" id="qna_isi" class="form-control" placeholder="Detail Pertanyaan" cols="30" rows="5"></textarea>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>
<?php
    $query = mysqli_query($con,"SELECT * FROM qna WHERE id_kursus = $id");
     while ($list_qna = mysqli_fetch_array($query)) { ?>
        <div class="card-body">   
            <div class="callout callout-info">
                <a href="jawaban-qna.php?id=<?php echo $list_qna['id_qna'];?>"><h3><?php echo $list_qna['pertanyaan']; ?></h3></a>
                <h5><?php echo $list_qna['nama'];?></h5>
                <br><br>               
            </div>                            
        </div>
<?php } ?>