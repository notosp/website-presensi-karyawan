<?php
	$pg = isset($_GET['pages']) ? $_GET['pages'] : '' ;
    switch ($pg) {
			  case 'list-pengajuan-lembur':
		  			if(!file_exists('list-pengajuan-lembur.php'))die(header('location:error-brow.html'));
	  						include("list-pengajuan-lembur.php");
  					break;
        case 'login':
            if(!file_exists('login.php'))die(header('location:error-brow.html'));
                include("login.php");
            break;
				case 'masuk':
		        if(!file_exists('login-baru.php'))die(header('location:error-brow.html'));
		            include("login-baru.php");
		        break;
				case 'pengajuan-lembur':
						if(!file_exists('pengajuan-lembur.php'))die(header('location:error-brow.html'));
								include("pengajuan-lembur.php");
						break;
				case 'forgot':
		        if(!file_exists('forgot.php'))die(header('location:error-brow.html'));
		            include("forgot.php");
		        break;
        case 'logout':
            if(!file_exists('logout.php'))die(header('location:error-brow.html'));
                include("logout.php");
            break;
        case 'dashboard-admin':
            if(!file_exists('dashboard-admin.php'))die(header('location:error-brow.html'));
                include("dashboard-admin.php");
            break;
        case 'dashboard-pegawai':
            if(!file_exists('dashboard-pegawai.php'))die(header('location:error-brow.html'));
                include("dashboard-pegawai.php");
            break;
  			case 'data-kehadiran':
	          if(!file_exists('data-kehadiran.php'))die(header('location:error-brow.html'));
	              include("data-kehadiran.php");
         	  break;
				case 'profile-admin':
				 		if(!file_exists('profile-admin.php'))die(header('location:error-brow.html'));
				 				include("profile-admin.php");
				 	  break;
				case 'setting-waktu':
				 		if(!file_exists('setting-waktu.php'))die(header('location:error-brow.html'));
				 				include("setting-waktu.php");
				 	  break;
				case 'edit-waktu':
						if(!file_exists('edit-waktu.php'))die(header('location:error-brow.html'));
								include("edit-waktu.php");
						break;
				case 'edit-password':
						if(!file_exists('edit-password.php'))die(header('location:error-brow.html'));
								include("edit-password.php");
						break;
				case 'kelola-jabatan':
						if(!file_exists('kelola-jabatan.php'))die(header('location:error-brow.html'));
								include("kelola-jabatan.php");
						break;
				case 'edit-jabatan':
						if(!file_exists('edit-jabatan.php'))die(header('location:error-brow.html'));
								include("edit-jabatan.php");
    				break;
				case 'edit-absensi':
						if(!file_exists('edit-absensi.php'))die(header('location:error-brow.html'));
								include("edit-absensi.php");
						break;
				case 'kelola-pegawai':
						if(!file_exists('kelola-pegawai.php'))die(header('location:error-brow.html'));
								include("kelola-pegawai.php");
						break;
				case 'edit-pegawai':
						if(!file_exists('edit-pegawai.php'))die(header('location:error-brow.html'));
								include("edit-pegawai.php");
						break;
				case 'kelola-absensi':
						if(!file_exists('kelola-absensi.php'))die(header('location:error-brow.html'));
								include("kelola-absensi.php");
						break;
				case 'kelola-absensi-total':
						if(!file_exists('kelola-absensi-total.php'))die(header('location:error-brow.html'));
								include("kelola-absensi-total.php");
						break;
				case 'kelola-absensi-cetak':
						if(!file_exists('kelola-absensi-cetak.php'))die(header('location:error-brow.html'));
								include("kelola-absensi-cetak.php");
						break;
				case 'kelola-absensi-lembur':
				  	if(!file_exists('kelola-absensi-lembur.php'))die(header('location:error-brow.html'));
								include("kelola-absensi-lembur.php");
						break;
			}
?>
