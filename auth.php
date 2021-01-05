<?php require_once("koneksi/dbkoneksi.php")?>
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $query = mysqli_query($con,"SELECT * FROM peserta WHERE email='$email'");
    while ($login = mysqli_fetch_array($query)) { 
        if($email == $login['email'] and $password == $login['password'] and $login['status'] == 'Belum Langganan') {
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $login['nama'];
            $_SESSION['id_peserta'] = $login['id_peserta'];
            $_SESSION['status'] = false;
            header("Location: daftar-langganan.php");
        }
        else if($email == $login['email'] and $password == $login['password'] and $login['status'] == 'Langganan'){
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $login['nama'];
            $_SESSION['id_peserta'] = $login['id_peserta'];
            $_SESSION['status'] = true;
            header("Location: discover.php");
        }        
    }
    
}
?>