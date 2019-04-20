<?php
include("koneksi.php");
include("session.php");
include("format-tgl.php");

$sql1 = mysqli_query($connect, "select *, count(jabatan.id_jabatan) as jml_jabatan from jabatan");
$a = mysqli_fetch_array($sql1);
$jml_jabatan = $a['jml_jabatan'];

$sql2 = mysqli_query($connect, "select *, count(pegawai.nip) as jml_pegawai from pegawai");
$b = mysqli_fetch_array($sql2);
$jml_pegawai = $b['jml_pegawai'];

$sql3 = mysqli_query($connect, "select *, count(pegawai.nip) as jml_pegawai_cowo from pegawai where jk = 'Laki-laki'");
$c = mysqli_fetch_array($sql3);
$jml_pegawai_cowo = $c['jml_pegawai_cowo'];

$sql4 = mysqli_query($connect, "select *, count(pegawai.nip) as jml_pegawai_cewe from pegawai where jk = 'Perempuan'");
$d = mysqli_fetch_array($sql4);
$jml_pegawai_cewe = $d['jml_pegawai_cewe'];

$qy_pegawai = mysqli_query($connect, "SELECT * FROM pegawai, jabatan, pengguna WHERE pegawai.nip = '$_SESSION[nip]' AND pegawai.jabatan = jabatan.id_jabatan AND pegawai.nip = pengguna.nip");
$pegawai = mysqli_fetch_array($qy_pegawai);

?>
        <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">
            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">

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
                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="link-effect font-w700 mr-5" href="dashboard-admin">
                                <span class="font-size-xl text-dual-primary-dark">Bank</span><span class="font-size-xl text-danger"> Wakaf</span>
                            </a>
                        </div>
                        <!-- END Logo -->
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

                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible my-50" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-wrench fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?= $jml_jabatan ?>">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Jabatan</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-users fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600"><span data-toggle="countTo" data-speed="1000" data-to="<?= $jml_pegawai ?>">0</span></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Pegawai</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-symbol-male fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?= $jml_pegawai_cowo ?>">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Pegawai Laki-laki</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-symbol-female fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?= $jml_pegawai_cewe ?>">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Pegawai Perempuan</div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #5 -->
                        <!-- jabatan -->
                        <div class="col-6 col-md-3 col-xl-3">
                            <a class="block block-link-shadow text-center" href="kelola-jabatan">
                                <div class="block-content ribbon ribbon-bookmark ribbon-success ribbon-left">
                                    <p class="mt-5">
                                        <i class="si si-wrench fa-5x"></i>
                                    </p>
                                    <p class="font-w600">Kelola Jabatan</p>
                                </div>
                            </a>
                        </div>
                        <!-- pegawai -->
                        <div class="col-6 col-md-3 col-xl-3">
                            <a class="block block-link-shadow text-center" href="kelola-pegawai">
                                <div class="block-content">
                                    <p class="mt-5">
                                        <i class="si si-users fa-5x"></i>
                                    </p>
                                    <p class="font-w600">Kelola Pegawai</p>
                                </div>
                            </a>
                        </div>
                        <!-- absensi -->
                        <div class="col-6 col-md-3 col-xl-3">
                            <a class="block block-link-shadow text-center" href="kelola-absensi">
                                <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-left">
                                    <p class="mt-5">
                                        <i class="si si-book-open fa-5x"></i>
                                    </p>
                                    <p class="font-w600">Kelola Absensi</p>
                                </div>
                            </a>
                        </div>
                        <!-- setting -->
                        <div class="col-6 col-md-3 col-xl-3">
                            <a class="block block-link-shadow text-center" href="setting-waktu">
                                <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-left">
                                    <p class="mt-5">
                                        <i class="si si-settings fa-5x"></i>
                                    </p>
                                    <p class="font-w600">Setting Waktu</p>
                                </div>
                            </a>
                        </div>

                        <!-- END Row #5 -->
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
