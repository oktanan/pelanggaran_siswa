<?php
    session_start();
    require_once('koneksi.php');
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    $query = "SELECT pelanggaran.* ,nis, nama_siswa, kelas, tipe_pelanggaran.violation_name, tanggal FROM pelanggaran INNER JOIN 
    siswa ON pelanggaran.id_siswa=siswa.nis INNER JOIN 
    tipe_pelanggaran ON pelanggaran.id_tipe=tipe_pelanggaran.id_tipe ";
    $siswaw = mysqli_query($conn,$query);
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
                    <div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-14">
					<div class="card-body">
	
					<h2>Detail Pelanggaran</h2>
					<table class="table-data">
                    <?php foreach($siswaw as $detail) { ?>
						<tr>
							<td>Nis</td>
							<td>:</td>
							<td><?= $detail['nis'];?></td>
						</tr>
						<tr>
							<td>Nama Siswa</td>
							<td>:</td>
							<td><?= $detail['nama_siswa'];?></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>:</td>
							<td><?= $detail['kelas'];?></td>
						</tr>
						<tr>
							<td>Pelanggaran</td>
							<td>:</td>
							<td><?= $detail['violation_name'];?></td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td>:</td>
							<td><?= $detail['tanggal'];?></td>
						</tr>
                        <?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
                    </div>
                </div>
            <!-- Content wrapper --> 
            <?php require_once('layout/footer.php');?>

    <?php require_once('layout/js.php'); ?>
  </body>
</html>