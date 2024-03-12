<?php
    $halaman = "dashboard";
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en"class="light-style layout-menu-fixed"dir="ltr"data-theme="theme-default"
 data-assets-path="sneat/assets/"data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Dashboard</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="sneat/assets/img/favicon/favicon.ico" />
    <?php require_once('layout/_css.php'); ?>
  </head>

  <body>
 
  <?php require_once('layout/sidebar.php');?>

        <?php require_once('layout/navbar.php');?>
    
            <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container flex-grow-1 container-p-y my-2">
                    <p class="pt-6">
                      Hallo Selamat Datang dihalaman Pelanggaran Siswa
                    </p>
                    </div>
                </div>
            <!-- Content wrapper --> 
            <?php require_once('layout/footer.php');?>

    <?php require_once('layout/js.php'); ?>
  </body>
</html>