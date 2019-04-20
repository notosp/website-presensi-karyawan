        <?php
        include("koneksi.php");
        include("session.php");
        include("format-tgl.php");

        $qy_pegawai = mysqli_query($connect, "SELECT * FROM pegawai, jabatan, pengguna WHERE pegawai.nip = '$_SESSION[nip]' AND pegawai.jabatan = jabatan.id_jabatan AND pegawai.nip = pengguna.nip");
        $pegawai = mysqli_fetch_array($qy_pegawai);

        if ($pegawai['status'] == 'Baru') {
          header('location:edit-password');
        }

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
                            <a class="link-effect font-w700 mr-5" href="dashboard-pegawai">
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
                              <?php if($pegawai['hak_akses'] == 'Admin'){ ?>
                              <a class="dropdown-item" href="dashboard-admin">
                                  <i class="si si-note mr-5"></i> Page Admin
                              </a>
                              <div class="dropdown-divider"></div>
                              <?php } ?>
                              <a class="dropdown-item" href="pengajuan-lembur">
                                  <i class="si si-note mr-5"></i> Pengajuan Lembur
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="data-kehadiran">
                                  <i class="si si-note mr-5"></i> Data Kehadiran
                              </a>
                              <div class="dropdown-divider"></div>
                              <?php if($pegawai['hak_akses'] == 'Pegawai'){ ?>
                                <a class="dropdown-item" href="edit-password">
                                    <i class="si si-note mr-5"></i> Edit Password
                                </a>
                              <div class="dropdown-divider"></div>
                              <?php } ?>
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

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form action="bd_search.html" method="post">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <!-- Close Search Section -->
                                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                    <button type="button" class="btn btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <!-- END Close Search Section -->
                                </span>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-secondary px-15">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

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
                <!-- User Info -->
                <div class="bg-image bg-image-fixed" style="background-image: url('assets/img/photos/bankwakaf.jpg');">
                    <div class="bg-primary-dark-op" style="padding:22px 0 22px 0">
                        <div class="content content-full text-center">
                            <!-- Avatar -->
                            <div class="mb-15">
                                <a class="img-link" href="#">
                                  <?php if($pegawai['foto'] == ''){ ?>
                                  <img class="img-avatar img-avatar96 img-avatar-thumb" style="width:100px;height:100px;" src="assets/img/avatars/avatar0.jpg" alt="">
                                  <?php }else { ?>
                                  <img class="img-avatar img-avatar96 img-avatar-thumb" style="width:100px;height:100px;" src="assets/img/avatars/<?php echo $pegawai['foto']; ?>" alt="">
                                  <?php } ?>
                                </a>
                            </div>
                            <!-- END Avatar -->

                            <!-- Personal -->
                            <h1 class="h3 text-white font-w700 mb-10"><?= $pegawai['nama_pegawai']; ?></h1>
                            <h2 class="h5 text-white-op">
                            <?= $pegawai['nama_jabatan']; ?> (<?= $pegawai['hak_akses']; ?>)
                            </h2>

                            <center>
                            <table class="table table-sm" style="width:80%">
                              <tr class="text-white-op">
                                <td style="width:40%">NIP</td>
                                <td><?= $pegawai['nip']; ?></td>
                              </tr>
                              <tr class="text-white-op">
                                <td style="width:40%">Tempat, Tanggal Lahir</td>
                                <td><?= $pegawai['tmp_lahir']; ?>, <?= indonesian_date($pegawai['tgl_lahir']); ?></td>
                              </tr>
                              <tr class="text-white-op">
                                <td>Jenis Kelamin</td>
                                <td><?= $pegawai['jk']; ?></td>
                              </tr>
                              <tr class="text-white-op">
                                <td>Alamat</td>
                                <td><?= $pegawai['alamat']; ?></td>
                              </tr>
                            </table>
                            </center>
                            <br><br>
                            <!-- END Personal -->
                            <?php

                            $j = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam WHERE id_jam = '1'"));

                            date_default_timezone_set("Asia/Jakarta");
                            $tgl = date("Y-m-d");

                            $jam = date("H:i");

                            $awalpagi = $j['awalabsen_pagi'];
                            $akhirpagi = $j['akhirabsen_pagi'];

                            $awalsore = $j['awalabsen_sore'];
                            $akhirsore = $j['akhirabsen_sore'];

                            ?>
                        </div>
                    </div>
                </div>
                <!-- END User Info -->

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
