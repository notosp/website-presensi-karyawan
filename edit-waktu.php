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
                                <a href="kelola-absensi"><i class="si si-book-open"></i>Kelola Absensi</a>
                            </li>
                            <li>
                                <a class="active" href="setting-waktu"><i class="si si-settings"></i>Setting</a>
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
                <!-- Hero -->
                <div class="bg-primary">
                    <div class="bg-pattern bg-black-op-25" style="background-image: url('assets/img/various/bg-pattern.png');">
                        <div class="content content-top text-center">
                            <div class="py-5  ">
                                <h1 class="font-w700 text-white mb-50">Atur Waktu Absensi</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <?php
                $jam = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam"));
                 ?>
                <div class="container block-content block-content-full mt-30">
                  <div class="row justify-content-center">
                    <div class="col-md-6 block block-themed">
                      <div class="block-header bg-gd-sun">
                          <h3 class="block-title">Edit Waktu Absensi</h3>
                      </div>
                      <div class="block-content">
                        <form action="update-jam.php" method="post">
                          <table class="table table-responsive">
                            <tr>
                              <th><label for="side-overlay-profile-name">Awal Absensi Pagi</label></th>
                              <td>
                                <div class="input-group">
                                  <input type="hidden" class="form-control" name="id" value="<?= $jam['id_jam']; ?>">
                                  <input type="text" class="form-control" id="single-input" name="awal-pagi" value="<?= $jam['awalabsen_pagi']; ?>">
                                  <span class="input-group-addon"><i class="si si-clock"></i></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="side-overlay-profile-name">Akhir Absensi Pagi</label></th>
                              <td>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="single-input2" name="akhir-pagi" value="<?= $jam['akhirabsen_pagi']; ?>">
                                  <span class="input-group-addon"><i class="si si-clock"></i></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="side-overlay-profile-name">Awal Absensi Sore</label></th>
                              <td>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="single-input3" name="awal-sore" value="<?= $jam['awalabsen_sore']; ?>">
                                  <span class="input-group-addon"><i class="si si-clock"></i></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="side-overlay-profile-name">Akhir Absensi Sore</label></th>
                              <td>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="single-input4" name="akhir-sore" value="<?= $jam['akhirabsen_sore']; ?>">
                                  <span class="input-group-addon"><i class="si si-clock"></i></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="side-overlay-profile-name">Awal Absensi Lembur</label></th>
                              <td>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="single-input5" name="lembur" value="<?= $jam['awalabsen_lembur']; ?>">
                                  <span class="input-group-addon"><i class="si si-clock"></i></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="side-overlay-profile-name">Akhir Absensi Lembur</label></th>
                              <td>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="single-input6" name="akhir-lembur" value="<?= $jam['awalabsen_lembur']; ?>">
                                  <span class="input-group-addon"><i class="si si-clock"></i></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="side-overlay-profile-name">Batas Jam Lembur</label></th>
                              <td>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="single-input7" name="batas-lembur" value="<?= $jam['batasjam_lembur']; ?>">
                                  <span class="input-group-addon"><i class="si si-clock"></i></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="side-overlay-profile-name">Jumlah Uang Lembur Perjam</label></th>
                              <td>
                                <div class="input-group">
                                  <input type="number" class="form-control" id="" name="uang-lembur" value="<?= $jam['uang_lembur']; ?>">
                                </div>
                              </td>
                            </tr>
                          </table>

                        <div class="form-group row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-block btn-alt-primary">
                                    <i class="fa fa-refresh mr-5"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                      </div>
                  </div>
                  </div>
                </div>
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
       <!-- END Page Container -->
