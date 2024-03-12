<?php 
	include 'koneksi.php';

	$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($peserta);
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="sneat/assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
  <title>PendaftaranLomba</title>
  <meta name="description" content="" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="sneat/assets/img/favicon/favicon.ico" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
  <?php require_once("layout/_css.php"); ?>
  <!-- Page -->
  <link rel="stylesheet" href="sneat/assets/vendor/css/pages/page-auth.css" />
  <script>
		window.print();
	</script>

</head>

<body>
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-7">
					<div class="card-body">
	
					<h2>Bukti Pendaftaran</h2>
					<table class="table-data" border="0">
						<tr>
							<td>Kode Pendaftaran</td>
							<td>:</td>
							<td><?php echo $p->id_pendaftaran ?></td>
						</tr>
						<tr>
							<td>Tahun Ajaran</td>
							<td>:</td>
							<td><?php echo $p->th_ajaran ?></td>
						</tr>
						<tr>
							<td>Asal Sekolah</td>
							<td>:</td>
							<td><?php echo $p->asal_sekolah ?></td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><?php echo $p->nm_peserta ?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?php echo $p->tmp_lahir.','.$p->tgl_lahir ?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?php echo $p->jk ?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?php echo $p->agama ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $p->almt_peserta ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>