<?php
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
                <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">My Profile</h6>
                    <form action="crud.php" method="post">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']?>">
                                <input type="text" class="form-control" name="nis" value="<?= $_SESSION['nis']?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="<?= $_SESSION['nama']?>">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki"
                                    <?php if($_SESSION['jenis_kelamin']=="Laki-laki") { echo "checked"; }?> > Laki-laki
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
                                    <?php if($_SESSION['jenis_kelamin']=="Perempuan") { echo "checked"; }?> > Perempuan
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Masuk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tahun_masuk" value="<?= $_SESSION['tahun_masuk']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Floating label select example" name="kelas">
                                    <option value="RA" <?php if($_SESSION['kelas']=="RA") { echo "selected"; }?>>RA</option>                                   
                                    <option value="RB" <?php if($_SESSION['kelas']=="RB") { echo "selected"; }?>>RB</option>
                                    <option value="RC" <?php if($_SESSION['kelas']=="RC") { echo "selected"; }?>>RC</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" value="<?= $_SESSION['alamat']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $_SESSION['tempat_lahir']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_lahir" value="<?= $_SESSION['tanggal_lahir']?>">
                            </div>
                        </div>
                        <button name="update_profile" type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
        </div>
            <!-- Content wrapper --> 
            <?php require_once('layout/footer.php');?>

    <?php require_once('layout/js.php'); ?>
  </body>
</html>