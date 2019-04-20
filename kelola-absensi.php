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
                                <a href="kelola-jabatan"><i class="si si-wrench"></i>Kelola Jabatan</a>
                            </li>
                            <li>
                                <a href="kelola-pegawai"><i class="si si-users"></i>Kelola Pegawai</a>
                            </li>
                            <li>
                                <a class="active" href="kelola-absensi"><i class="si si-book-open"></i>Kelola Absensi</a>
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
                                <h1 class="h2 font-w700 text-white mb-10">Kelola Absensi</h1>
                                <h2 class="h4 font-w400 text-white-op mb-0">Halaman untuk mengelola Absensi</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content">
                  <div class="row gutters-tiny invisible" data-toggle="appear">
                    <!-- Row #5 -->
                    <!-- jabatan -->
                    <div class="col-sm-3 col-md-4 col-xl-4">
                        <a class="block block-link-shadow text-center bg-primary" href="kelola-absensi">
                            <div class="block-content ribbon ribbon-bookmark ribbon-success ribbon-left">
                                <p class="mt-5">
                                    <i class="si si-calendar fa-3x text-info-light"></i>
                                </p>
                                <p class="font-w600 text-info-light">Absensi Hari ini</p>
                            </div>
                        </a>
                    </div>
                    <!-- pegawai -->
                    <div class="col-sm-3 col-md-2 col-xl-2">
                        <a class="block block-link-shadow text-center bg-info" href="kelola-absensi-total">
                            <div class="block-content">
                                <p class="mt-5">
                                    <i class="si si-book-open fa-3x text-info-light"></i>
                                </p>
                                <p class="font-w600 text-info-light">Absensi Total</p>
                            </div>
                        </a>
                    </div>
                    <!-- absensi -->
                    <!-- pegawai -->
                    <div class="col-sm-3 col-md-2 col-xl-2">
                        <a class="block block-link-shadow text-center bg-info" href="kelola-absensi-lembur">
                            <div class="block-content">
                                <p class="mt-5">
                                    <i class="si si-book-open fa-3x text-info-light"></i>
                                </p>
                                <p class="font-w600 text-info-light">Data Lembur</p>
                            </div>
                        </a>
                    </div>
                    <!-- absensi -->
                    <div class="col-sm-3 col-md-4 col-xl-4">
                        <a class="block block-link-shadow text-center bg-info" href="kelola-absensi-cetak">
                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-left">
                                <p class="mt-5">
                                    <i class="si si-printer text-info-light fa-3x"></i>
                                </p>
                                <p class="font-w600 text-info-light">Cetak Laporan</p>
                            </div>
                        </a>
                    </div>

                    <!-- END Row #5 -->
                  </div>
                  <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Dynamic Table Full -->
                        <div class="block col-12">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Data Absensi</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                                <table class="table table-bordered table-responsive table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th>NIP</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Absen Pagi</th>
                                            <th>Status Absen Pagi</th>
                                            <th>Absen Sore</th>
                                            <th>Status Absen Sore</th>
                                            <th>Absen Lembur</th>
                                            <th>Jumlah Lembur</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $m = date('m');
                                      $y = date('Y');
                                      $d = date('d');
                                      $no = 1;
                                      $qy_jabatan = mysqli_query($connect, "SELECT * FROM absensi, pegawai WHERE MONTH(tgl_absen) = '$m' AND YEAR(tgl_absen) = '$y' AND DAY(tgl_absen) = '$d' AND absensi.nip = pegawai.nip");
                                      while ($jabatan = mysqli_fetch_array($qy_jabatan)) {
                                       ?>
                                        <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $jabatan['nip'] ?></td>
                                          <td><?= indonesian_date($jabatan['tgl_absen']) ?></td>
                                          <td><?= $jabatan['nama_pegawai'] ?></td>
                                          <?php if($jabatan['absen_pagi'] == ''){ ?>
                                          <td>-</td>
                                          <?php }else{ ?>
                                          <td width="63px;"><?= $jabatan['absen_pagi'] ?></td>
                                          <?php } ?>
                                          <td width="63px;"><?= $jabatan['status_pagi'] ?></td>
                                          <?php if($jabatan['absen_sore'] == ''){ ?>
                                          <td>-</td>
                                          <?php }else{ ?>
                                          <td width="63px;"><?= $jabatan['absen_sore'] ?></td>
                                          <?php } ?>
                                          <td width="63px;"><?= $jabatan['status_sore'] ?></td>
                                          <?php if($jabatan['absen_lembur'] == ''){ ?>
                                          <td width="63px;">-</td>
                                          <?php }else{ ?>
                                          <td width="63px;"><?= $jabatan['absen_lembur'] ?></td>
                                          <?php } ?>
                                          <?php if($jabatan['jml_lembur'] == ''){ ?>
                                          <td width="63px;">-</td>
                                          <?php }else{ ?>
                                          <td width="63px;"><?= $jabatan['jml_lembur'] ?></td>
                                          <?php } ?>
                                          <td class="text-center">
                                            <form class="" action="edit-absensi" method="post">
                                              <input type="hidden" name="id" value="<?= $jabatan['id_absensi'] ?>">
                                              <input type="hidden" name="nip" value="<?= $jabatan['nip'] ?>">
                                              <button type="submit" class="btn btn-md btn-secondary" data-toggle="tooltip" title="Edit">
                                                <i class="si si-note"></i>
                                              </button>
                                            </form>
                                            </td>
                                            <!-- <td>
                                              <form class="" action="hapus-absensi.php" method="get">
                                                <input type="hidden" name="id" value="<?= $jabatan['id_absensi'] ?>">
                                                <button type="submit" class="btn btn-md btn-secondary" data-toggle="tooltip" title="Edit">
                                                  <i class="si si-trash"></i>
                                                </button>
                                              </form>
                                            </td> -->
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
