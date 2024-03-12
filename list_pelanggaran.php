<?php
$halaman = "list_pelanggaran";
require_once('koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}

$query = "SELECT pelanggaran.* ,nis, nama_siswa, kelas, tipe_pelanggaran.violation_name, tanggal FROM pelanggaran INNER JOIN 
    siswa ON pelanggaran.id_siswa=siswa.nis INNER JOIN 
    tipe_pelanggaran ON pelanggaran.id_tipe=tipe_pelanggaran.id_tipe ";
$hasil = mysqli_query($conn, $query);
$query = "SELECT* FROM tipe_pelanggaran";
$data = mysqli_query($conn, $query);
$query = "SELECT* FROM siswa";
$siswa = mysqli_query($conn, $query);


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
 
  <?php require_once('layout/sidebar.php'); ?>

        <?php require_once('layout/navbar.php'); ?>
    
            <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container flex-grow-1 container-p-y my-2">
                    <div class="card">
                <h5 class="card-header">List Pelanggaran</h5>
                <div class="card-header">
                      <div class="mt-0">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                          Isi Laporan
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Masukan laporan anda...</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="pelanggaran_model.php" method="post"> 
                            <div class="col-md-0">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <select name="nis" id="">
                                        <?php foreach ($siswa as $s) { ?> 
                                        <option value="<?= $s['nis'] ?>"><?= $s['nama_siswa'] ?></option>
                                        <?php } ?>
                                      </select>
                                    <div class="mb-3">
                                      <br>
                                      <select name="id_tipe" id="">
                                        <?php foreach ($data as $d) { ?> 
                                        <option value="<?= $d['id_tipe'] ?>"><?= $d['violation_name'] ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="mb-3 row">
                                       <div class="col-md-10">
                                        <input class="form-control" type="date" name="tanggal"  id="html5-date-input">
                                      </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                                
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="simpan_laporan"class="btn btn-primary">Simpan</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Pelanggaran</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($hasil as $dataa) { ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $dataa['nis']; ?></td>
                            <td><?= $dataa['nama_siswa']; ?></td>
                            <td><?= $dataa['kelas']; ?></td>
                            <td><?= $dataa['violation_name']; ?></td>
                            <td><?= $dataa['tanggal']; ?></td>
                            <td>
                                  
                                  <button type="button" onclick="upd('<?= $dataa['id_pelanggaran'] ?>','<?= $dataa['nama_siswa'] ?>',
                                  '<?= $dataa['violation_name'] ?>','<?= $dataa['tanggal'] ?>')" class="btn btn-warning tf-icons bx bx-edit"
                                  data-bs-toggle="modal" data-bs-target="#editModal">
                                  </button>
                                  <a onclick="return confirm('Yakinnn?')"
                                  class="badge bg-danger"
                                  href="pelanggaran_model.php?drop=<?= $dataa['id_pelanggaran'] ?>"><i class="tf-icons bx bx-trash"></i></a>
                              </td>
                        </tr>
                    <?php } ?>
                    <div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editModalTitle">Masukan laporan anda...</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="pelanggaran_model.php" method="post"> 
                            <div class="col-md-0">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <select name="nis" id="">
                                        <?php foreach ($siswa as $s) { ?> 
                                        <option value="<?= $s['nis'] ?>"><?= $s['nama_siswa'] ?></option>
                                        <?php } ?>
                                      </select>
                                    <div class="mb-3">
                                      <br>
                                      <select name="id_tipe" id="">
                                        <?php foreach ($data as $d) { ?> 
                                        <option value="<?= $d['id_tipe'] ?>"><?= $d['violation_name'] ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="mb-3 row">
                                       <div class="col-md-10">
                                        <input class="form-control" type="date" value="<?= $dataa['tanggal']; ?>" name="tanggal"  id="html5-date-input">
                                      </div>
                                      <input type="hidden" id="id_pelanggaran" name="id" value="">
                                    </div>
                                    </div>
                                </div>
                            </div>
                                
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="simpan_laporan"class="btn btn-primary">Simpan</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    </tbody>
                  </table> 
                </div>
              </div>
                    </div> 
                </div>
            <!-- Content wrapper -->
            <script>
    function upd(id_pelanggaran, nama_siswa, violation_name, tanggal){
      document.getElementById("nama_siswa").value=nama_siswa;
      document.getElementById("violation_name").value=violation_name;
      document.getElementById("tanggal").value=tanggal;
      document.getElementById("id_pelanggaran").value=id_pelanggaran;
    }
  </script> 
            <?php require_once('layout/footer.php'); ?>

    <?php require_once('layout/js.php'); ?>
  </body>
</html>