<?php
include("koneksi.php");
include("session.php");
include("format-tgl.php");

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
                            <a class="dropdown-item" href="edit-password">
                                <i class="si si-note mr-5"></i> Edit Password
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
                  <form action="update_password.php" method="post">

                    <div class="block block-themed" data-toggle="appear">
                        <div class="block-header bg-gd-sun">
                            <h3 class="block-title">Edit Password</h3>
                            <div class="block-options">
                                <button type="submit" class="btn btn-square btn-danger">
                                    <i class="fa fa-save mr-5"></i>Save
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row justify-content-center">
                              <div class="col-6">
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-name">Nama</label>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control" id="side-overlay-profile-name" name="id" placeholder="Your name.." value="<?= $pegawai['id_user']; ?>">
                                            <input type="text" class="form-control" id="side-overlay-profile-name" name="nama" placeholder="Your name.." value="<?= $pegawai['nama_pegawai']; ?>">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-email">NIP</label>
                                        <div class="input-group">
                                            <input type="text" readonly class="form-control" id="side-overlay-profile-email" name="nip" placeholder="Your email.." value="<?= $pegawai['nip']; ?>">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-password">Password Lama</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="side-overlay-profile-password" name="pass_lama" required placeholder="Masukan Password Lama..">
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-password">Password Baru</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="pass1" name="pass_baru" placeholder="Masukan Password Baru.." required>
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-password-confirm">Konfirmasi Password Baru</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="pass2" name="konfirmasi_pass" onkeyup="checkPass(); return false;" required placeholder="Konfirm Password Baru..">
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        </div>
                                        <span id="confirmMessage" class="confirmMessage"></span>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                          <center>
                                            <button type="submit" class="btn btn-block btn-alt-primary">
                                                <i class="fa fa-refresh mr-5"></i> Update
                                            </button>
                                          </center>
                                        </div>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>

                  </form>
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
<script type="text/javascript">
function checkPass()
{
  //Store the password field objects into variables ...
  var pass1 = document.getElementById('pass1');
  var pass2 = document.getElementById('pass2');
  //Store the Confimation Message Object ...
  var message = document.getElementById('confirmMessage');
  //Set the colors we will be using ...
  var goodColor = "#42a5f5";
  var badColor = "#ff6666";
  //Compare the values in the password field
  //and the confirmation field
  if(pass2.value == ""){
    message.innerHTML = ""
  }else if(pass1.value == pass2.value){
      //The passwords match.
      //Set the color to the good color and inform
      //the user that they have entered the correct password
      pass2.style.backgroundColor = goodColor;
      message.style.color = goodColor;
      message.innerHTML = "Password Cocok!"
  }else{
      //The passwords do not match.
      //Set the color to the bad color and
      //notify the user.
      pass2.style.backgroundColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Password Tidak Cocok!"
  }
}
</script>
