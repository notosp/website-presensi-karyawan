<?php
define("ROW_PER_PAGE",4);
include("koneksi.php");
include("session.php");
include("format-tgl.php");

$nip = $_GET['nip'];
$qy = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM pegawai, jabatan WHERE pegawai.nip = '$nip' AND pegawai.jabatan = jabatan.id_jabatan"));
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
                                <a class="active" href="kelola-pegawai"><i class="si si-users"></i>Kelola Pegawai</a>
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
                                            <h1 class="h2 font-w700 text-white mb-10">Edit Data Pegawai</h1>
                                            <h2 class="h4 font-w400 text-white-op mb-0">Halaman Untuk Mengedit Data Pegawai</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Hero -->

                            <!-- Page Content -->
                            <div class="content">
                                <!-- Orders -->

                                <div class="block block-rounded">
                                    <div class="block-content">
                                      <div class="block block-themed block-transparent mb-0">
                                          <div class="block-header bg-primary-dark">
                                              <h3 class="block-title">Edit Pegawai</h3>
                                              <div class="block-options">
                                                  <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                  </button>
                                              </div>
                                          </div>
                                          <div class="block-content">
                                              <form action="update-pegawai.php" enctype="multipart/form-data" method="post">

                                                <div class="form-group row">
                                                    <div class="col-md-9">
                                                       <div class="form-material floating">
                                                          <input type="hidden" class="form-control" id="material-text2" name="nip_lama" value="<?= $qy['nip'] ?>">
                                                          <input type="text" class="form-control" id="material-text2" name="nip" value="<?= $qy['nip'] ?>">
                                                          <label for="material-text2">NIP</label>
                                                       </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-9">
                                                       <div class="form-material floating">
                                                          <input type="text" class="form-control" id="material-text2" name="nama" value="<?= $qy['nama_pegawai'] ?>">
                                                          <label for="material-text2">Nama Lengkap</label>
                                                       </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                  <div class="col-6">
                                                    <div class="form-material floating">
                                                      <input type="text" class="form-control" id="material-gridf2" name="tmp_lahir" value="<?= $qy['tmp_lahir'] ?>">
                                                      <label for="material-gridf2">Tempat Lahir</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-6 row">
                                                    <div class="form-material">
                                                      <input type="text" class="js-datepicker form-control" value="<?= $qy['tgl_lahir'] ?>" id="example-datepicker6" name="tgl_lahir" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="Masukan Tanggal Lahir">
                                                      <label for="example-datepicker6">Tanggal Lahir</label>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                      <label for="example-datepicker6">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-12">
                                                      <?php if($qy['jk'] == 'Laki-laki'){ ?>
                                                      <label class="css-control css-control-primary css-radio mr-10">
                                                        <input type="radio" class="css-control-input" name="jk" value="Laki-laki" checked>
                                                        <span class="css-control-indicator"></span> Laki - Laki
                                                      </label>
                                                      <label class="css-control css-control-primary css-radio">
                                                        <input type="radio" class="css-control-input" name="jk" value="Perempuan">
                                                        <span class="css-control-indicator"></span> Perempuan
                                                      </label>
                                                      <?php }else{ ?>
                                                        <label class="css-control css-control-primary css-radio mr-10">
                                                          <input type="radio" class="css-control-input" name="jk" value="Laki-laki">
                                                          <span class="css-control-indicator"></span> Laki - Laki
                                                        </label>
                                                        <label class="css-control css-control-primary css-radio">
                                                          <input type="radio" class="css-control-input" name="jk" value="Perempuan" checked>
                                                          <span class="css-control-indicator"></span> Perempuan
                                                        </label>
                                                      <?php } ?>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                  <div class="col-12">
                                                    <div class="form-material floating">
                                                        <textarea class="form-control" id="material-textarea-small2" name="alamat" rows="3"><?= $qy['alamat'] ?></textarea>
                                                        <label for="material-textarea-small2">Alamat</label>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-8">
                                                      <div class="form-material">
                                                        <select class="js-select2 form-control" id="example2-select2" name="jabatan" style="width: 100%;" data-placeholder="Choose one.." required>
                                                          <option value="<?= $qy['id_jabatan'] ?>"><?= $qy['nama_jabatan'] ?></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                          <?php $qy_jb = mysqli_query($connect, "SELECT * FROM jabatan");
                                                                while ($jb = mysqli_fetch_array($qy_jb)) {
                                                           ?>
                                                          <option value="<?= $jb['id_jabatan']; ?>"><?= $jb['nama_jabatan']; ?></option>
                                                          <?php } ?>
                                                        </select>
                                                        <label for="example2-select2">Jabatan</label>
                                                      </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-8">
                                                      <img class="img-fluid" style="width:300px;height:300px;" src="assets/img/avatars/<?= $qy['foto'] ?>" alt="">
                                                      <br><label><input type="checkbox" id="toggle1" name="ubah_foto" value="true"> Ceklis jika ingin menambahkan foto</label><br>
                                                      <div class="form-material">
                                                        <input type="file" accept="image/*" name="foto" class="form-control" id="foto" required disabled/>
                                                        <label for="example2-select2">Foto</label>
                                                      </div>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="form-group row">
                                                  <div class="col-12">
                                                    <button type="submit" class="btn btn-alt-info">
                                                      <i class="si si-check mr-5"></i> Simpan
                                                    </button>
                                                  </div>
                                                </div>
                                              </form>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <!-- END Orders -->
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
       <!-- END Page Container -->
