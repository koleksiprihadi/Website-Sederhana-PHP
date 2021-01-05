<?php
    require_once("koneksi/dbkoneksi.php");
    if (isset($_POST['beli'])) {
        $paket = $_POST['lama_langganan'];
        $offset = strtotime("+$paket day");
        $lama_langganan = date("Y-m-d H:i:s", $offset);
        if($paket == 360){
            $harga = 1200000;
        }else{
            $harga = 300000;
        }
        $sql = mysqli_query($con,"INSERT INTO `invoice` (`id_req`, `id_peserta`, `nama`, `tanggal`, `lama_langganan`, `batas_pembayaran`, `upload_pembayaran`, `status`, `harga`) VALUES (NULL, '".$_POST["id_peserta"]."', '".$_POST["nama"]."', '".$_POST["tanggal"]."', '$lama_langganan', '".$_POST["batas_pembayaran"]."', 'belumlunas.png', 'Belum Lunas', '$harga');");
        $id = $_POST["id_peserta"];
        header("Location: invoice.php?id=$id");
    } 
?>