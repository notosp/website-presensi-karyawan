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
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <div class="col-md-12">
                          <!-- Floating Labels -->
                          <div class="block">
                              <div class="block-header block-header-default">
                                  <h3 class="block-title">Edit Jabatan</h3>
                                  <div class="block-options">
                                      <button type="button" class="btn-block-option">
                                          <i class="si si-wrench"></i>
                                      </button>
                                  </div>
                              </div>
                              <div class="block-content">
                                <div class="col-md-12">
                                    <form action="update-jabatan.php" method="post">
                                        <div class="block block-rounded block-themed">
                                            <div class="block-header bg-gd-primary">
                                                <h3 class="block-title">Edit Data Jabatan</h3>
                                                <div class="block-options">
                                                    <button type="submit" class="btn btn-sm btn-alt-primary">
                                                        <i class="fa fa-save mr-5"></i>Save
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content block-content-full">
                                                <div class="form-group row">
                                                    <label class="col-12" for="ecom-product-name">Id Jabatan</label>
                                                    <div class="col-12">
                                                        <input type="hidden" class="form-control" id="ecom-product-name" name="id_lama" placeholder="Product Name" value="<?= $_POST['id'] ?>">
                                                        <input type="text" class="form-control" id="ecom-product-name" name="id" placeholder="Product Name" value="<?= $_POST['id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12" for="ecom-product-name">Nama Jabatan</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" id="ecom-product-name" name="nama" placeholder="Product Name" value="<?= $_POST['nama'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                          </div>
                          <!-- END Floating Labels -->
                       </div>
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
