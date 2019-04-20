<?php
include("koneksi.php");
include("session.php");
include("format-tgl.php");

$qy_pegawai = mysqli_query($connect, "SELECT * FROM pegawai, jabatan WHERE pegawai.nip = '$_SESSION[nip]' AND pegawai.jabatan = jabatan.id_jabatan");
$pegawai = mysqli_fetch_array($qy_pegawai);
$jam = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam WHERE id_jam = 1"));
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
                          <a class="block block-link-shadow text-center bg-primary" href="kelola-absensi-lembur">
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
                          <div class="block">
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                                <table class="table table-bordered table-responsive table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th width="100px">Jam</th>
                                            <th>Kepentingan</th>
                                            <th width="150px">ACC</th>
                                            <th width="50px"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="loadDataLembur">
                                      <div id="pesan">

                                      </div>

                                      <?php
                                      $qy_lembur = $connect->query("SELECT * FROM pengajuan_lembur, pegawai WHERE pengajuan_lembur.nip = pegawai.nip AND pengajuan_lembur.arsip = 'Tidak'");
                                       $no = 1;
                                       while($j = $qy_lembur->fetch_array()){ ?>
                                         <tr>
                                           <td><?= $no; ?></td>
                                           <td><?= $j['nip']; ?></td>
                                           <td><?= $j['nama_pegawai']; ?></td>
                                           <td><?= $j['tgl']; ?></td>
                                           <td><?= $j['waktu']; ?> WIB</td>
                                           <td><?= $j['kepentingan']; ?></td>
                                           <td>
                                             <input type="hidden" name="uang" value="<?= $jam['uang_lembur'] ?>">
                                             <input type="hidden" name="id_pengajuan" value="<?= $j['id_lembur'] ?>">
                                             <input type="hidden" name="wkt" value="<?= $j['waktu'] ?>">
                                             <input type="hidden" name="absen" value="<?= $j['id_absensi'] ?>">
                                             <select class="form-control" name="acc">
                                               <option value="">Pilih</option>
                                               <option value="Ya">Terima</option>
                                               <option value="Tidak">Tolak</option>
                                             </select>
                                           </td>
                                           <td><button type="button" onclick="acc()" class="btn btn-rounded btn-primary min-width-125 mb-10">Kirim</button></td>
                                         </tr>
                                         <?php $no++; } ?>

                                    </tbody>
                                </table>
                            </div>
                          </div>
                          <!-- Floating Labels -->
                          <div class="block">
                              <div class="block-header block-header-default">
                                  <h3 class="block-title">Data Lembur</h3>
                                  <div class="block-options">
                                      <button type="button" class="btn-block-option">
                                          <i class="si si-wrench"></i>
                                      </button>
                                  </div>
                              </div>

                              <div class="block-content">
                                    <form class="" enctype="multipart/form-data" action="" method="post">
                                      <div class="form-group row justify-content-center">
                                          <div class="col-md-4">
                                              <div class="form-material">
                                                  <select class="form-control" name="bulan" id="bulan">
                                                    <option value="">Pilih Bulan</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                  </select>
                                                  <label for="example-datepicker4">Pilih bulan</label>
                                              </div>
                                          </div>
                                          <div class="col-md-2">
                                              <div class="form-material">
                                                  <select class="form-control" name="tahun" >
                                                    <option value="">Pilih Tahun</option>

                                                    <?php
                                                      $a= 2010;
                                                      $b= date('Y');
                                                      for($i=$b; $a<=$i; $i--){
                                                      ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>

                                                  </select>
                                                  <label for="example-datepicker4">Pilih Tahun</label>
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-material">
                                                <button type="submit" name="search" id="search1" class="btn btn-alt-primary">Pilih</button>
                                              </div>
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
                              <?php
                              if(isset($_POST['search'])){
                               ?>
                                <h3 class="block-title">Data Lembur <?= bulan($_POST['bulan']); ?></h3>
                              <?php }else{ ?>
                                <h3 class="block-title">Data Lembur Total</h3>
                              <?php } ?>
                            </div>
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                                <table class="table table-bordered table-responsive table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th>NIP</th>
                                            <th>Bulan</th>
                                            <th>Nama</th>
                                            <th>Absen Lembur</th>
                                            <th>Jumlah Lembur</th>
                                            <th>Uang Lembur</th>
                                            <!-- <th></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        if(isset($_POST['search'])){
                                          $que = mysqli_query($connect, "SELECT * FROM absensi, pegawai WHERE absensi.nip = pegawai.nip AND absensi.absen_lembur != '' AND month(absensi.tgl_absen) = '$_POST[bulan]' AND year(absensi.tgl_absen) = '$_POST[tahun]' ORDER BY absensi.id_absensi DESC");
                                          $no = 1; while($jk = mysqli_fetch_array($que)){ ?>
                                            <tr>
                                              <td><?= $no; ?></td>
                                              <td><?= $jk['nip']; ?></td>
                                              <td><?= indonesian_date($jk['tgl_absen']); ?></td>
                                              <td><?= $jk['nama_pegawai']; ?></td>
                                              <td><?= $jk['absen_lembur']; ?> WIB</td>
                                              <td><?= $jk['jml_lembur']; ?> Jam</td>
                                              <td>Rp<?= number_format($jk['uang_lembur']); ?>,-</td>
                                            </tr>
                                            <?php $no++; } ?>
                                        <?php }else {
                                          $que = mysqli_query($connect, "SELECT * FROM absensi, pegawai WHERE absensi.nip = pegawai.nip AND absensi.absen_lembur != '' ORDER BY absensi.id_absensi DESC");
                                          $no = 1; while($jk = mysqli_fetch_array($que)){
                                       ?>
                                        <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $jk['nip']; ?></td>
                                          <td><?= indonesian_date($jk['tgl_absen']); ?></td>
                                          <td><?= $jk['nama_pegawai']; ?></td>
                                          <td><?= $jk['absen_lembur']; ?> WIB</td>
                                          <td><?= $jk['jml_lembur']; ?> Jam</td>
                                          <td>Rp<?= number_format($jk['uang_lembur']); ?>,-</td>
                                        </tr>
                                        <?php $no++; } } ?>
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
            <script src="assets/js/core/jquery.min.js"></script>
            <script type="text/javascript">
            function myFunction() {
              location.reload();
            }
              function acc() {
                var absensi = $("[name='absen']").val();
                var acc = $("[name='acc']").val();
                var id_pengajuan = $("[name='id_pengajuan']").val();
                var wkt = $("[name='wkt']").val();
                var uang = $("[name='uang']").val();

                $.ajax({
                  type    : "POST",
                  data    : "absensi="+absensi+"&acc="+acc+"&id_pengajuan="+id_pengajuan+"&wkt="+wkt+"&uang="+uang,
                  url     : "acc.php",
                  success : function(result) {
                    var resultObj = JSON.parse(result);
                    $("#pesan").html(resultObj.message);
                  }
                });
              }
            </script>
