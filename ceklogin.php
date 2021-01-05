<?php
    if($_SESSION["login"] == true){
        header("Location: daftar-langganan.php");
    }else{
        header("Location: login.php");
    }
?>