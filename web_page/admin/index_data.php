<?php 
include ("../config.php");
 ?>
<?php 
session_start();

	include("../config.php");
	include("../functions.php");

	$user_data = check_login($koneksi);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../assets/images/icon_web.ico"/>

    <title> Informasi Data Hasil Tembak </title>

    <!-- Bootstrap -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <ul class="nav side-menu">
                    <!-- Bar Menu KE-1 -->
                    <li>
                    <a href="index_data.php?page=tmp_utama"><i class="fa fa-home"></i>Semua Data<span class="fa fa-chevron"></span></a>
                    </li>                

                    <!-- Bar Menu KE-1(Revisi) -->
                    <li><a href="#"><i class="fa fa-table"></i> DEMAK <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="index_data.php?page=tmbh_dt_Demak&dt=Demak">Tambah Data</a></li>
                        <li><a href="index_data.php?page=tmp_rvs_Demak&tmp=Demak">Revisi Data</a></li>
                      </ul>
                    </li>

                    <!-- Bar Menu KE-2(Revisi) -->
                    <li><a href="#"><i class="fa fa-table"></i> VILA DAGO <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="index_data.php?page=tmbh_dt_Vila&dt=Vila">Tambah Data</a></li>
                        <li><a href="index_data.php?page=tmp_rvs_Vila&tmp=Vila">Revisi Data</a></li>
                      </ul>
                    </li>

                    <!-- Bar Menu KE-3(Revisi) -->
                    <li><a href="#"><i class="fa fa-table"></i> PETOMPON <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="index_data.php?page=tmbh_dt_Petompon&dt=Petompon">Tambah Data</a></li>
                        <li><a href="index_data.php?page=tmp_rvs_Petompon&tmp=Petompon">Revisi Data</a></li>
                      </ul>
                    </li>

                    <!-- Bar Menu KE-4(Revisi) -->
                    <li><a href="#"><i class="fa fa-table"></i> BANDUNG <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="index_data.php?page=tmbh_dt_Bandung&dt=Bandung">Tambah Data</a></li>
                        <li><a href="index_data.php?page=tmp_rvs_Bandung&tmp=Bandung">Revisi Data</a></li>
                      </ul>
                    </li>

                  </ul>
                </div>
              </div>
              <!-- /sidebar menu -->   
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings" href="#">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" href="#">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock" href="#">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-list"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" >
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src='../assets/images/ft_profile.jpg'><?php echo $user_data['nama_lengkap'];?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="index_data.php?page=my_profile"> Profile</a>
                      <a class="dropdown-item"  href="index_data.php?page=monitoring_user">
                        <span class="badge bg-red pull-right">100%</span>
                        <span>Monitoring</span>
                      </a>
                    <a class="dropdown-item"  href="../../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">

      <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['page']) {
        // Tampilan Data(Mode View Only)
      	case 'tmp_utama':
      		include '../tmp_data_utama.php';
          break;

        // Tambah data Berdasarkan Alamat(Demak)
      	case 'tmbh_dt_Demak':
      		include 'add_data/1_demak/tmbh_demak.php';
          break;
        // Edit data
        case 'tmp_rvs_Demak':
          include 'revisi_data/1_demak/tmp_revisi_demak.php';
          break;
        

        // Tambah data Berdasarkan Alamat(Vila Dago)
      	case 'tmbh_dt_Vila':
      		include 'add_data/2_vila/tmbh_vila.php';
          break;
        // Edit data
        case 'tmp_rvs_Vila':
          include 'revisi_data/2_vila/tmp_revisi_vila.php';
          break;


        // Tambah data Berdasarkan Alamat(Petompon)
      	case 'tmbh_dt_Petompon':
      		include 'add_data/3_petompon/tmbh_petompon.php';
          break;
        // Edit data
        case 'tmp_rvs_Petompon':
          include 'revisi_data/3_petompon/tmp_revisi_petompon.php';
          break;


        // Tambah data Berdasarkan Alamat(Bandung)
      	case 'tmbh_dt_Bandung':
      		include 'add_data/4_bandung/tmbh_bandung.php';
          break;
        // Edit data
        case 'tmp_rvs_Bandung':
          include 'revisi_data/4_bandung/tmp_revisi_bandung.php';
          break;


        // Config Untuk Edit Data
        case 'rvs_data':
          include 'revisi_data/edi_dt_admin.php';
          break; 

        //Page Untuk Edit Profile Pribadi
        case 'my_profile':
          include '../my_profile/profile.php';
          break;

        // Melihat Profile Semua User Yang Telah Mendaftar
        case 'monitoring_user':
          include 'monitoring/monitor_user.php';
          break;
        case 'result_user':
          include 'monitoring/result_tembak_user.php';
          break;
        case 'edit_mntr':
          include 'monitoring/edi_mon_admin.php';
          break;
          
        // Tampilan Pertama Saat Setelah Login
        default:
		      include '../home.php';
		      break;
        }
        ?>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <footer>
          <div class="pull-right">
            
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../assets/js/custom.min.js"></script>

  </body>
</html>
