<?php
define("ROW_PER_PAGE",4);
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
                                            <h1 class="h2 font-w700 text-white mb-10">Kelola Pegawai</h1>
                                            <h2 class="h4 font-w400 text-white-op mb-0">Halaman Untuk Mengelola Data Pegawai</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Hero -->

                            <!-- Page Content -->
                            <div class="content">
                                <!-- Orders -->
                                <div class="content-heading">
                                    <div class="dropdown float-right">
                                        <button type="button" class="btn btn-alt-info" data-toggle="modal" data-target="#modal-fadein">
                                            Tambah Pegawai
                                        </button>
                                    </div>
                                    Data Pegawai
                                </div>
                                <div class="block block-rounded">
                                    <div class="block-content bg-body-light">
                                      <?php
                                      	$search_keyword = '';
                                      	if(!empty($_POST['search']['keyword'])) {
                                      		$search_keyword = $_POST['search']['keyword'];
                                      	}
                                      	$sql = 'SELECT * FROM pegawai WHERE nama_pegawai LIKE :keyword OR nip LIKE :keyword ORDER BY nip DESC ';

                                      	/* Pagination Code starts */
                                      	$per_page_html = '';
                                      	$page = 1;
                                      	$start=0;
                                      	if(!empty($_POST["page"])) {
                                      		$page = $_POST["page"];
                                      		$start=($page-1) * ROW_PER_PAGE;
                                      	}
                                      	$limit=" limit " . $start . "," . ROW_PER_PAGE;
                                      	$pagination_statement = $pdo_conn->prepare($sql);
                                      	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
                                      	$pagination_statement->execute();

                                      	$row_count = $pagination_statement->rowCount();
                                      	if(!empty($row_count)){
                                      		$per_page_html .= "<nav aria-label='Orders navigation'>
                                          <ul class='pagination justify-content-end'>";
                                      		$page_count=ceil($row_count/ROW_PER_PAGE);
                                      		if($page_count>1) {
                                      			for($i=1;$i<=$page_count;$i++){
                                      				if($i==$page){
                                      					$per_page_html .= '<li class="page-item active">
                                                                    <input type="submit" name="page" value="' . $i . '" class="btn btn-primary active" />';
                                                $per_page_html .= '</li>';
                                              } else {
                                      					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn btn-default" />';
                                      				}
                                      			}
                                      		}
                                      		$per_page_html .= "</ul></nav>";
                                      	}

                                      	$query = $sql.$limit;
                                      	$pdo_statement = $pdo_conn->prepare($query);
                                      	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
                                      	$pdo_statement->execute();
                                      	$result = $pdo_statement->fetchAll();
                                      ?>
                                        <!-- Search -->
                                        <form name='frmSearch' action='' method='post'>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type='text' name='search[keyword]' placeholder="Masukan NIP / Nama Pegawai" value="<?php echo $search_keyword; ?>" id='keyword' class="form-control" maxlength='25'>
                                                </div>
                                            </div>
                                        <!-- END Search -->
                                    </div>
                                    <div class="block-content">
                                        <div class="row items-push">
                                          <?php
                                          if(!empty($result)) {
                                            foreach($result as $row) {
                                          ?>
                                          <div class="col-md-6 col-xl-3">
                                              <div class="block block-rounded bg-danger text-center">
                                                  <div class="block-content block-content-full">
                                                      <?php if($row['foto'] == ''){ ?>
                                                      <img class="img-avatar" style="width:100px;height:100px;" src="assets/img/avatars/avatar0.jpg" alt="">
                                                      <?php }else { ?>
                                                      <img class="img-avatar" style="width:100px;height:100px;" src="assets/img/avatars/<?php echo $row['foto']; ?>" alt="">
                                                      <?php } ?>
                                                  </div>
                                                  <div class="block-content block-content-full bg-black-op-5" style="height:310px;">
                                                      <div class="font-w600" style="color:#f4f4f4"><?php echo $row['nip']; ?></div><hr>
                                                      <div class="font-size-sm" style="color:#f4f4f4"><?php echo $row['nama_pegawai']; ?></div><hr>
                                                      <div class="font-size-sm" style="color:#f4f4f4"><?= $row['tmp_lahir']; ?>, <?= indonesian_date($row['tgl_lahir']); ?></div><hr>
                                                      <div class="font-size-sm" style="color:#f4f4f4"><?php echo $row['jk']; ?></div><hr>
                                                      <div class="font-size-sm" style="color:#f4f4f4"><?php echo $row['alamat']; ?></div><hr>
                                                  </div>
                                                  <div class="block-content block-content-full">
                                                      <a class="btn btn-rounded btn-alt-secondary" href="media.php?pages=edit-pegawai&nip=<?php echo $row['nip']; ?>">
                                                          <i class="si si-pencil mr-5"></i>Edit
                                                      </a>
                                                      <a class="btn btn-rounded btn-alt-primary" href="hapus-pegawai.php?nip=<?php echo $row['nip']; ?>">
                                                          <i class="si si-trash mr-5"></i>Hapus
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php
                                          }
                                          }
                                          ?>

                                        </div>
                                        <?php echo $per_page_html; ?>
                                      </form>
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

       <!-- Fade In Modal -->
        <div class="modal fade" id="modal-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Tambah Pegawai</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <form action="simpan-pegawai.php" enctype="multipart/form-data" method="post">

                              <div class="form-group row">
                                  <div class="col-md-9">
                                     <div class="form-material floating">
                                        <input type="text" class="form-control" id="material-text2" name="nip">
                                        <label for="material-text2">NIP</label>
                                     </div>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <div class="col-md-9">
                                     <div class="form-material floating">
                                        <input type="text" class="form-control" id="material-text2" name="nama">
                                        <label for="material-text2">Nama Lengkap</label>
                                     </div>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-6">
                                  <div class="form-material floating">
                                    <input type="text" class="form-control" id="material-gridf2" name="tmp_lahir">
                                    <label for="material-gridf2">Tempat Lahir</label>
                                  </div>
                                </div>
                                <div class="col-6 row">
                                  <div class="form-material">
                                    <input type="date" class="js-datepicker form-control" name="tgl_lahir" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="Masukan Tanggal Lahir">
                                    <label for="example-datepicker6">Tanggal Lahir</label>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                  <div class="col-12">
                                    <label for="example-datepicker6">Jenis Kelamin</label>
                                  </div>
                                  <div class="col-12">
                                    <label class="css-control css-control-primary css-radio mr-10">
                                      <input type="radio" class="css-control-input" name="jk" value="Laki-laki" checked>
                                      <span class="css-control-indicator"></span> Laki - Laki
                                    </label>
                                    <label class="css-control css-control-primary css-radio">
                                      <input type="radio" class="css-control-input" name="jk" value="Perempuan">
                                      <span class="css-control-indicator"></span> Perempuan
                                    </label>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-12">
                                  <div class="form-material floating">
                                      <textarea class="form-control" id="material-textarea-small2" name="alamat" rows="3"></textarea>
                                      <label for="material-textarea-small2">Alamat</label>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                  <div class="col-lg-8">
                                    <div class="form-material">
                                      <select class="js-select2 form-control" id="example2-select2" name="jabatan" style="width: 100%;" data-placeholder="Choose one..">
                                        <option>Pilih Jabatan</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
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
                                    <div class="form-material">
                                      <input type="file" accept="image/*" name="foto" class="form-control" />
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
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- END Fade In Modal -->
