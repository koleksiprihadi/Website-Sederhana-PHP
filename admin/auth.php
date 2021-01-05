<?php require_once("../koneksi/dbkoneksi.php")?>
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $query = mysqli_query($con,"SELECT * FROM pengajar WHERE email='$email'");
    while ($login = mysqli_fetch_array($query)) { 
        if($email == $login['email'] and $password == $login['password'] and $login['privilage'] == 'pengajar') {
            $_SESSION['session'] = true;
            $_SESSION['nama_pengajar'] = $login['nama'];
            $_SESSION['id_pengajar'] = $login['id_pengajar'];
            $_SESSION['privilage'] = 'pengajar';
            header("Location: index.php");
        }
        elseif($email == $login['email'] and $password == $login['password'] and $login['privilage'] == 'admin'){
            $_SESSION['superadmin'] = true;
            $_SESSION['nama_admin'] = $login['nama'];
            $_SESSION['id_admin'] = $login['id_pengajar'];
            $_SESSION['privilage'] = 'admin';
            header("Location: superadmin.php");
        }
    }
}
?>