<?php
session_start();
if ($_SESSION['session'] == false){
    header("Location: login-admin.php");
}?>
<?php require_once("../koneksi/dbkoneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <?php require_once("header.php"); ?>  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php require_once("navbar.php"); ?>

  <!-- Sidebar -->
  <?php require_once("sidebar.php"); ?>

  <!-- Konten page -->
  <?php require_once("admin-page.php"); ?>

  <!-- Script -->
  <?php require_once("script.php"); ?>
</body>
</html>
