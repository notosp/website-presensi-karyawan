<?php
include("koneksi.php");
include("session.php");
include("format-tgl.php");

$qy_pegawai = mysqli_query($connect, "SELECT * FROM pegawai, jabatan, pengguna WHERE pegawai.nip = pengguna.nip AND pegawai.nip = '$_SESSION[nip]' AND pegawai.jabatan = jabatan.id_jabatan");
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
                <div class="bg-image bg-image-bottom" style="background-image: url('assets/img/photos/photo13@2x.jpg');">
                    <div class="bg-primary-dark-op py-30">
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
                                <br>
                                <div class="font-size-md text-muted">NIP . <?= $pegawai['nip']; ?></div>
                            </h2>
                            <!-- END Personal -->
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
                            <!-- Actions -->
                            <button type="button" href="#myDIV" class="btn btn-rounded btn-hero btn-sm btn-alt-success my-20" onclick="myFunction()">
                                <i class="fa fa-plus mr-5"></i> Ubah Password
                            </button>
                            <!-- END Actions -->
                        </div>
                    </div>
                </div>
                <!-- END User Info -->

                <!-- Main Content -->
                <div class="content" id="myDIV" style="display:none; overflow:hidden">
                    <!-- Projects -->
                    <h2 class="content-heading">
                      <center>Rubah Password</center>
                    </h2>
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="block block-rounded ribbon ribbon-modern ribbon-primary text-center">
                                <div class="block-content col-md-6">
                                    <form action="update_password.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-15">
                                            <label for="side-overlay-profile-name">Nama</label>
                                            <div class="input-group">
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Colleagues -->
                    <script type="text/javascript">
                    function myFunction() {
                        var x = document.getElementById("myDIV");
                        if (x.style.display === "block") {
                            x.style.display = "none";
                        } else {
                            x.style.display = "block";
                        }
                    }

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

                </div>
                <!-- END Main Content -->
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
