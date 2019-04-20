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
                                <a class="active" href="kelola-absensi"><i class="si si-book-open"></i>Kelola Absesnsi</a>
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
                          <a class="block block-link-shadow text-center bg-info" href="kelola-absensi">
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
                          <a class="block block-link-shadow text-center bg-primary" href="kelola-absensi-total">
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
                        <div class="col-md-12">
                          <!-- Floating Labels -->
                          <div class="block">
                              <div class="block-header block-header-default">
                                  <h3 class="block-title">Absensi Total</h3>
                                  <div class="block-options">
                                      <button type="button" class="btn-block-option">
                                          <i class="si si-wrench"></i>
                                      </button>
                                  </div>
                              </div>

                              <div class="block-content">
                                      <div class="form-group row justify-content-center">
                                          <div class="col-md-4">
                                              <div class="form-material">
                                                  <input type="text" class="js-datepicker form-control" id="start_date" name="start_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="Pilih tanggal awal">
                                                  <label for="example-datepicker4">Pilih tanggal</label>
                                              </div>
                                          </div>
                                          <div class="col-md-2">
                                            <div class="form-material">
                                                <center><h6 class="block-title mt-2">s/d</h6></center>
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-material">
                                                  <input type="text" class="js-datepicker form-control" id="end_date" name="end_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="Pilih tanggal akhir">
                                                  <label for="example-datepicker4">Pilih tanggal</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-md-12 text-center">
                                              <button type="button" name="search" id="search" class="btn btn-alt-primary">Pilih</button>
                                          </div>
                                      </div>
                              </div>
                          </div>
                          <!-- END Floating Labels -->
                      </div>
                        <!-- Dynamic Table Full -->
                        <div class="block col-12">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Data Absensi</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                                <table id="order_data" class="table table-bordered table-responsive table-striped table-vcenter">
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
                                            <th>Uang Lembur</th>
                                            <th></th>
                                        </tr>
                                    </thead>
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
