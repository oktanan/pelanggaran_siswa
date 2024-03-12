<?php
    $halaman = "datasiswa";
    require_once('koneksi.php');
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    $query = "SELECT*FROM siswa order by id_siswa asc";
    $lihat = mysqli_query($conn,$query);
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
                <h5 class="card-header">Data Siswa</h5>
                <div class="card-body">
                    <div class="col-lg-4 col-md-6">
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                          Add
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Data Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="pelanggaran_model.php" method="post"> 
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Nis</label>
                                    <input type="text" name="nis" id="nameWithTitle" class="form-control" placeholder="Enter Name">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Nama Siswa</label>
                                    <input type="text" name="nama_siswa" id="nameWithTitle" class="form-control" placeholder="Enter Name">
                                  </div>
                                </div>
                                <div class="mb-3">
                                        <label for="exampleDataList" class="form-label">Kelas</label>
                                        <input class="form-control" name="kelas" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                        <datalist id="datalistOptions">
                                        <option value="XI RA"></option>
                                        <option value="XI RB"></option>
                                        <option value="XI RC"></option>
                                        </datalist>
                                    </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no= 1; foreach($lihat as $ds) { ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $ds['nis']; ?></td>
                            <td><?= $ds['nama_siswa']; ?></td>
                            <td><?= $ds['kelas']; ?></td>
                            <td>
                                  <a class="badge bg-warning"
                                  href="detail.php?id_siswa=<?= $ds['id_siswa'] ?>"><i class="tf-icons bx bx-search"></i></a>
                                  <a onclick="return confirm('Yakinnn?')"
                                  class="badge bg-danger"
                                  href="pelanggaran_model.php?delete=<?= $ds['id_siswa'] ?>"><i class="tf-icons bx bx-trash"></i></a>
                              </td>
                        </tr>
                      
                    <?php } ?>
                      </tbody>
                    </table>
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