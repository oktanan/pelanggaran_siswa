<?php
    $halaman = "kategori_pelanggaran";
    require_once('koneksi.php');
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    $query = "SELECT*FROM tipe_pelanggaran order by id_tipe asc";
    $tampil = mysqli_query($conn,$query);
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
                <h5 class="card-header">Kategori Pelanggaran</h5>
                <div class="card-header">
                      <div class="mt-0">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                          Add
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
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">violation name</label>
                                        <input type="text" name="violation_name" class="form-control" placeholder="Masukan nama pelanggaran">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleDataList" class="form-label">Point Pelanggaran</label>
                                        <input class="form-control" name="get_point" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                        <datalist id="datalistOptions">
                                        <option value="3"></option>
                                        <option value="5"></option>
                                        <option value="10"></option>
                                        <option value="15"></option>
                                        <option value="20"></option>
                                        <option value="25"></option>
                                        </datalist>
                                    </div>
                                    </div>
                                </div>
                            </div>
                                
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="simpan_pelanggaran" class="btn btn-primary">Simpan</button>
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>violation name</th>
                        <th>get point</th>
                        <th>aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no= 1; foreach($tampil as $data) { ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $data['violation_name']; ?></td>
                            <td><?= $data['get_point']; ?></td>
                            <td>
                                  <a onclick="return confirm('Yakinnn?')"
                                  class="badge bg-danger"
                                  href="pelanggaran_model.php?hapus=<?= $data['id_tipe'] ?>"><i class="tf-icons bx bx-trash"></i></a>
                              </td>
                        </tr>
                      
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
                    </div>
                </div>
            <!-- Content wrapper --> 
            <?php require_once('layout/footer.php');?>

    <?php require_once('layout/js.php'); ?>
  </body>
</html>