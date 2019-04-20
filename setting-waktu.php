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
                              <h1 class="h2 font-w700 text-white mb-10">Kelola Waktu Kerja</h1>
                              <h2 class="h4 font-w400 text-white-op mb-0">Halaman Untuk Mengelola Data Waktu Kerja</h2>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- END Hero -->

                <div class="container block-content block-content-full mt-30">
                  <div class="block block-themed">
                      <div class="block-header bg-gd-sun">
                          <h3 class="block-title"></h3>
                          <div class="block-options">
                              <button type="button" onclick="window.location='edit-waktu'" class="btn-block-option">
                                  Edit
                              </button>
                          </div>
                      </div>
                      <div class="row gutters-tiny justify-content-center py-10">
                        <?php
                        $jam = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam"));
                         ?>
                        <div class="col-6 col-md-4 col-xl-2">
                           <a class="block block-transparent text-center bg-pulse" href="javascript:void(0)">
                               <div class="block-content">
                                   <p class="font-size-h4 text-white">
                                       <strong><?= $jam['awalabsen_pagi'] ?> WIB</strong>
                                   </p>
                               </div>
                               <div class="block-content bg-black-op-5">
                                   <p class="font-w600 text-white-op">
                                       <i class="si si-clock mr-5"></i><br>Awal Absensi Pagi
                                   </p>
                               </div>
                           </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                           <a class="block block-transparent text-center bg-pulse" href="javascript:void(0)">
                               <div class="block-content">
                                   <p class="font-size-h4 text-white">
                                       <strong><?= $jam['akhirabsen_pagi'] ?> WIB</strong>
                                   </p>
                               </div>
                               <div class="block-content bg-black-op-5">
                                   <p class="font-w600 text-white-op">
                                       <i class="si si-clock mr-5"></i><br>Akhir Absensi Pagi
                                   </p>
                               </div>
                           </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                           <a class="block block-transparent text-center bg-pulse" href="javascript:void(0)">
                               <div class="block-content">
                                   <p class="font-size-h4 text-white">
                                       <strong><?= $jam['awalabsen_sore'] ?> WIB</strong>
                                   </p>
                               </div>
                               <div class="block-content bg-black-op-5">
                                   <p class="font-w600 text-white-op">
                                       <i class="si si-clock mr-5"></i><br>Awal Absensi Sore
                                   </p>
                               </div>
                           </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                           <a class="block block-transparent text-center bg-pulse" href="javascript:void(0)">
                               <div class="block-content">
                                   <p class="font-size-h4 text-white">
                                       <strong><?= $jam['akhirabsen_sore'] ?> WIB</strong>
                                   </p>
                               </div>
                               <div class="block-content bg-black-op-5">
                                   <p class="font-w600 text-white-op">
                                       <i class="si si-clock mr-5"></i><br>Akhir Absensi Sore
                                   </p>
                               </div>
                           </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                           <a class="block block-transparent text-center bg-pulse" href="javascript:void(0)">
                               <div class="block-content">
                                   <p class="font-size-h4 text-white">
                                       <strong><?= $jam['awalabsen_lembur'] ?> WIB</strong>
                                   </p>
                               </div>
                               <div class="block-content bg-black-op-5">
                                   <p class="font-w600 text-white-op">
                                       <i class="si si-clock mr-5"></i><br>Awal Absensi Lembur
                                   </p>
                               </div>
                           </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                           <a class="block block-transparent text-center bg-pulse" href="javascript:void(0)">
                               <div class="block-content">
                                   <p class="font-size-h4 text-white">
                                       <strong><?= $jam['akhirabsen_lembur'] ?> WIB</strong>
                                   </p>
                               </div>
                               <div class="block-content bg-black-op-5">
                                   <p class="font-w600 text-white-op">
                                       <i class="si si-clock mr-5"></i><br>Akhir Absensi Lembur
                                   </p>
                               </div>
                           </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                           <a class="block block-transparent text-center bg-pulse" href="javascript:void(0)">
                               <div class="block-content">
                                   <p class="font-size-h4 text-white">
                                       <strong><?= $jam['batasjam_lembur'] ?> WIB</strong>
                                   </p>
                               </div>
                               <div class="block-content bg-black-op-5">
                                   <p class="font-w600 text-white-op">
                                       <i class="si si-clock mr-5"></i><br>Batsa Jam Lembur
                                   </p>
                               </div>
                           </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                           <a class="block block-transparent text-center bg-warning" href="javascript:void(0)">
                               <div class="block-content">
                                   <p class="font-size-h4 text-white">
                                       <strong>Rp.<?= number_format($jam['uang_lembur']) ?>,-</strong>
                                   </p>
                               </div>
                               <div class="block-content bg-black-op-5">
                                   <p class="font-w600 text-white-op">
                                       <i class="si si-clock mr-5"></i><br>Jumlah Uang Lembur
                                   </p>
                               </div>
                           </a>
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
