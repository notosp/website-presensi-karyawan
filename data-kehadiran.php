        <?php
        include("koneksi.php");
        include("session.php");
        include("format-tgl.php");

        $qy_pegawai = mysqli_query($connect, "SELECT * FROM pegawai, jabatan, pengguna WHERE pegawai.nip = '$_SESSION[nip]' AND pegawai.jabatan = jabatan.id_jabatan AND pegawai.nip = pengguna.nip");
        $pegawai = mysqli_fetch_array($qy_pegawai);

        ?>

        <div id="page-container" class="sidebar-inverse side-scroll page-header -fixed page-header-inverse main-content-boxed">

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
                            <?php } ?>
                              <a class="dropdown-item" href="data-kehadiran">
                                  <i class="si si-note mr-5"></i> Data Kehadiran
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
                            <i class="fa fa-sun-o fa-spin text-black"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
              <!-- Dynamic Table Simple -->
                 <div class="block">
                     <div class="bg-image bg-image-fixed" style="background-image: url('assets/img/photos/photo13@2x.jpg');">
                         <div class="bg-primary-dark-op">
                             <div class="content content-full text-center">
                                 <!-- Avatar -->
                                 <div class="mb-15">
                                     <a class="img-link" href="be_pages_generic_profile.html">
                                         <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets/img/avatars/<?= $pegawai['foto']; ?>" alt="">
                                     </a>
                                 </div>
                                 <!-- END Avatar -->

                                 <!-- Personal -->
                                 <h1 class="h3 text-white font-w700 mb-10"><?= $pegawai['nama_pegawai']; ?></h1>
                                 <h2 class="h5 text-white-op">
                                 <?= $pegawai['nama_jabatan']; ?>
                                 </h2>

                                 <center>
                                 <table class="table table-sm" style="width:80%">
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
                             </div>
                         </div>
                     </div>
                     <div class="block-header block-header-default">
                       <h2 class="block-title" style="text-align:center;">Data Kehadiran</h2>
                     </div>
                     <div class="block-content block-content-full" style="width:90%">
                         <!-- DataTables init on table by adding .js-dataTable-simple class, functionality initialized in js/pages/be_tables_datatables.js -->
                         <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                             <thead>
                                 <tr>
                                     <th class="text-center"></th>
                                     <th>Tanggal</th>
                                     <th>Absen Pagi</th>
                                     <th>Status Absen Pagi</th>
                                     <th>Absen Sore</th>
                                     <th>Status Absen Sore</th>
                                     <th>Absen Lembur</th>
                                     <th>Jumlah Lembur</th>
                                 </tr>
                             </thead>
                             <tbody>
                               <?php
                               $qy = mysqli_query($connect, "SELECT * FROM absensi, pegawai WHERE pegawai.nip = absensi.nip AND pegawai.nip = '$_SESSION[nip]' ORDER BY absensi.tgl_absen");
                               $no = 1;
                               while ($a = mysqli_fetch_array($qy)) {
                                ?>
                                 <tr>
                                     <td class="text-center"><?= $no; ?></td>
                                     <td class="font-w600"><?= tanggal($a['tgl_absen']); ?></td>
                                     <td class="d-none d-sm-table-cell"><?= $a['absen_pagi']; ?></td>
                                     <td class="d-none d-sm-table-cell"><?= $a['status_pagi']; ?></td>
                                     <td class="d-none d-sm-table-cell"><?= $a['absen_sore']; ?></td>
                                     <td class="d-none d-sm-table-cell"><?= $a['status_sore']; ?></td>
                                     <?php if($a['absen_lembur'] == ''){ ?>
                                     <td class="d-none d-sm-table-cell">Tidak ada jam lembur</td>
                                     <?php }else{ ?>
                                     <td class="d-none d-sm-table-cell"><?= $a['absen_lembur']; ?></td>
                                     <?php } ?>
                                     <?php if($a['absen_lembur'] == ''){ ?>
                                     <td class="d-none d-sm-table-cell">-</td>
                                     <?php }else{ ?>
                                     <td class="d-none d-sm-table-cell"><?= $a['jml_lembur']; ?> Jam</td>
                                     <?php } ?>
                                   </tr>
                               <?php $no++; } ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <!-- END Dynamic Table Simple -->
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
