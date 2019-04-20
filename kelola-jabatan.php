<?php
include("koneksi.php");
include("session.php");
include("format-tgl.php");

$qy_pegawai = mysqli_query($connect, "SELECT * FROM pegawai, jabatan WHERE pegawai.nip = '$_SESSION[nip]' AND pegawai.jabatan = jabatan.id_jabatan");
$pegawai = mysqli_fetch_array($qy_pegawai);

?>
        <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">
            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="link-effect font-w700 mr-5" href="dashboard-admin">
                                <i class="si si-fire text-primary"></i>
                                <span class="font-size-xl text-dual-primary-dark">Bank</span><span class="font-size-xl text-danger"> Wakaf</span>
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Middle Section -->
                    <div class="content-header-section d-none d-lg-block">
                        <!-- Header Navigation -->
                        <!--
                        Desktop Navigation, mobile navigation can be found in #sidebar

                        If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
                        If your sidebar menu includes headings, they won't be visible in your header navigation by default
                        If your sidebar menu includes icons and you would like to hide them, you can add the class 'nav-main-header-no-icons'
                        -->
                        <ul class="nav-main-header">
                            <li>
                                <a href="dashboard-admin"><i class="si si-compass"></i>Dashboard</a>
                            </li>
                            <li>
                                <a class="active" href="kelola-jabatan"><i class="si si-wrench"></i>Kelola Jabatan</a>
                            </li>
                            <li>
                                <a href="kelola-pegawai"><i class="si si-users"></i>Kelola Pegawai</a>
                            </li>
                            <li>
                                <a href="kelola-absensi"><i class="si si-book-open"></i>Kelola Absensi</a>
                            </li>
                            <li>
                                <a href="setting-waktu"><i class="si si-settings"></i>Setting</a>
                            </li>
                        </ul>
                        <!-- END Header Navigation -->
                    </div>
                    <!-- END Middle Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                      <!-- User Dropdown -->
                      <div class="btn-group" role="group">
                          <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?= $pegawai['nama_pegawai'] ?><i class="fa fa-angle-down ml-5"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                              <a class="dropdown-item" href="dashboard-pegawai">
                                  <i class="si si-note mr-5"></i> Absensi
                              </a>
                              <a class="dropdown-item" href="profile-admin">
                                  <i class="si si-note mr-5"></i> Profile Admin
                              </a>
                              <div class="dropdown-divider"></div>


                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="keluar">
                                  <i class="si si-logout mr-5"></i> Sign Out
                              </a>
                          </div>
                      </div>
                      <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-image" style="background-image: url('assets/img/photos/photo26@2x.jpg');">
                    <div class="bg-black-op-75">
                        <div class="content content-top content-full text-center">
                            <div class="py-20">
                                <h1 class="h2 font-w700 text-white mb-10">Kelola Jabatan</h1>
                                <h2 class="h4 font-w400 text-white-op mb-0">Halaman untuk mengelola Jabatan</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <div class="col-md-12">
                          <!-- Floating Labels -->
                          <div class="block">
                              <div class="block-header block-header-default">
                                  <h3 class="block-title">Tambah Jabatan</h3>
                                  <div class="block-options">
                                      <button type="button" class="btn-block-option">
                                          <i class="si si-wrench"></i>
                                      </button>
                                  </div>
                              </div>
                              <?php
                              // mencari kode barang dengan nilai paling besar
                              $query = "SELECT max(id_jabatan) as maxKode FROM jabatan";
                              $hasil = mysqli_query($connect,$query);
                              $data = mysqli_fetch_array($hasil);
                              $kodeBarang = $data['maxKode'];

                              $noUrut = (int) substr($kodeBarang, 3, 3);

                              $noUrut++;

                              $char = "BW";
                              $kodeBarang = $char . sprintf("%04s", $noUrut);

                               ?>
                              <div class="block-content">
                                  <form action="simpan-jabatan.php" method="post">
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                              <div class="form-material floating">
                                                  <input type="text" value="<?= $kodeBarang ?>" readonly class="form-control" id="material-help2" name="id">
                                                  <label for="material-help2">Id Jabatan</label>
                                                  <div class="form-text text-muted text-right">Silahkan Masukan Kode Jabatan</div>
                                              </div>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-material floating">
                                                  <input type="text" class="form-control" id="material-help2" name="nama">
                                                  <label for="material-help2">Nama Jabatan</label>
                                                  <div class="form-text text-muted text-right">Silahkan Masukan Nama Jabatan</div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-md-12 text-center">
                                              <button type="submit" class="btn btn-alt-primary">Tambah</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                          <!-- END Floating Labels -->
                      </div>
                        <!-- Dynamic Table Full -->
                        <div class="block col-12">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Data Jabatan</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                                <table class="table table-bordered table-responsive table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th>Id Jabatan</th>
                                            <th>Nama Jabatan</th>
                                            <th class="text-center" style="width: 5%;"></th>
                                            <th class="text-center" style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      $qy_jabatan = mysqli_query($connect, "SELECT * FROM jabatan");
                                      while ($jabatan = mysqli_fetch_array($qy_jabatan)) {
                                       ?>
                                        <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $jabatan['id_jabatan'] ?></td>
                                          <td><?= $jabatan['nama_jabatan'] ?></td>
                                          <td class="text-center">
                                            <form class="" action="edit-jabatan" method="post">
                                              <input type="hidden" name="id" value="<?= $jabatan['id_jabatan'] ?>">
                                              <input type="hidden" name="nama" value="<?= $jabatan['nama_jabatan'] ?>">
                                              <button type="submit" class="btn btn-md btn-secondary" data-toggle="tooltip" title="Edit">
                                                <i class="si si-note"></i>
                                              </button>
                                            </form>
                                            </td>
                                            <td>
                                              <form class="" action="hapus-jabatan.php" method="post">
                                                <input type="hidden" name="id" value="<?= $jabatan['id_jabatan'] ?>">
                                                <button type="submit" class="btn btn-md btn-secondary" data-toggle="tooltip" title="Hapus">
                                                  <i class="si si-trash"></i>
                                                </button>
                                              </form>
                                            </td>
                                        </tr>
                                      <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Dynamic Table Full -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 1.3</a> &copy; <span class="js-year-copy">2017</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
            </div>
