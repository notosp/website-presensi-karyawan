<?php
include("koneksi.php");
include("session.php");
include("format-tgl.php");

$qy_pegawai = mysqli_query($connect, "SELECT * FROM pegawai, jabatan, pengguna WHERE pegawai.nip = '$_SESSION[nip]' AND pegawai.jabatan = jabatan.id_jabatan AND pegawai.nip = pengguna.nip");
$pegawai = mysqli_fetch_array($qy_pegawai);
date_default_timezone_set("Asia/Jakarta");
$tgl = date("Y-m-d");

$jam = date("H:i");

$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM absensi WHERE tgl_absen = '$tgl' AND nip = '$pegawai[nip]'"));


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
                    <div class="dropdown-divider"></div>

                      <a class="dropdown-item" href="pengajuan-lembur">
                          <i class="si si-note mr-5"></i> Pengajuan Lembur
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="data-kehadiran">
                          <i class="si si-note mr-5"></i> Data Kehadiran
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

                     </div>
                 </div>
             </div>
             <div class="block-header block-header-default">
               <h2 class="block-title bg-info" style="text-align:center;">Pengajuan Lembur Tanggal : <b><?= indonesian_date(date('d-m-Y')); ?></b></h2>
             </div>
             <div class="block-content block-content-full" style="width:90%">
               <!-- Normal Form -->
               <div class="block">
                   <div class="block-content">
                       <div class="row justify-content-center">
                         <div class="col-7">

                               <div class="form-group">
                                   <label for="example-nf-email">Kepentingan</label>
                                   <div id="pesan"></div>
                                   <input type="hidden" class="form-control" id="example-nf-email" name="nip" value="<?= $pegawai['nip'] ?>">
                                   <input type="hidden" name="tgl" value="<?= $tgl ?>">
                                   <input type="hidden" name="waktu" value="<?= $jam ?>">
                                   <input type="hidden" name="absen" value="<?= $qy['id_absensi'] ?>">
                                   <input type="text" class="form-control" id="kepentingan" name="kepentingan" placeholder="Kepentingan Melakukan Lembur">
                               </div>

                               <div class="form-group">
                                   <button type="button" onclick="ajukan()" class="btn btn-alt-primary">Ajukan</button>
                               </div>
                         </div>
                       </div>
                   </div>
               </div>
               <!-- END Normal Form -->
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

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
function myFunction() {
  location.reload();
}
  function ajukan() {
    var nip = $("[name='nip']").val();
    var tgl = $("[name='tgl']").val();
    var waktu = $("[name='waktu']").val();
    var kepentingan = $("[name='kepentingan']").val();
    var absen = $("[name='absen']").val();

    var kep = $("#kepentingan");
    if (kep.val() == "") {
      kep.css('border', '1px solid red');
    }else{
      kep.css('border', '1px solid green');
      $.ajax({
        type    : "POST",
        data    : "nip="+nip+"&tgl="+tgl+"&waktu="+waktu+"&kepentingan="+kepentingan+"&absen="+absen,
        url     : "pengajuan.php",
        success : function(result) {
          var resultObj = JSON.parse(result);
          $("#pesan").html(resultObj.message);
        }
      });
    }
  }
</script>
