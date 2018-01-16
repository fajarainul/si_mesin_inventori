<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Data Inventori Mesin</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>SI Data Inventori Mesin</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="#"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>

                  <li>
                      <a href="tampil_data_jenis_mesin.php">
                          <i class="fa fa-table"></i>
                          <span>Data Jenis Mesin</span>
                      </a>
                  </li>

                  <li>
                      <a href="tampil_data_mesin_inventori.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Data Mesin Inventori</span>
                      </a>
                  </li>

                  <li>
                      <a href="tampil_data_mesin_sewa.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Data Mesin Sewa</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Data Mesin Inventori</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                <div class="showback">
                  <h4><i class="fa fa-angle-right"></i> Tabel Mesin Inventori</h4>
                  <hr>

                  <div>
                    <a href="tambah_data_mesin_inventori.php" class="btn btn-primary" style="float: right;">Tambah Mesin Inventori</a>
                  </div>
                  <div class="clearfix"></div>
                  <!-- DIV TABLE -->
                  <div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Mesin</th>
                            <th>Jenis Mesin</th>
                            <th>Lokasi Mesin</th>
                            <th>Status Mesin</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <th>1</th>
                              <th>NomorMesin#1</th>
                              <th>Single Needle</th>
                              <th>10A</th>
                              <th>Dipakai</th>
                              <th>10 Desember 2017</th>
                              <th>12 Desember 2018</th>
                            <td>
                              <a href="ubah_data_mesin_inventori.php" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="hapus_data_mesin_inventori.php" class="btn btn-danger btn-xs" onclick="return konfirmasiHapus()"><i class="fa fa-trash-o "></i></a>
                            </td>
                          </tr>
                          <tr>
                              <th>2</th>
                              <th>NomorMesin#2</th>
                              <th>Single Needle</th>
                              <th>10B</th>
                              <th>Dipakai</th>
                              <th>10 Desember 2017</th>
                              <th>12 Desember 2018</th>
                            <td>
                              <a href="ubah_data_mesin_inventori.php" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="hapus_data_mesin_inventori.php" class="btn btn-danger btn-xs" onclick="return konfirmasiHapus()"><i class="fa fa-trash-o "></i></a>
                            </td>
                          </tr>
                          <tr>
                              <th>3</th>
                              <th>NomorMesin#3</th>
                              <th>Single Needle</th>
                              <th>10C</th>
                              <th>Dipakai</th>
                              <th>10 Desember 2017</th>
                              <th>12 Desember 2018</th>
                            <td>
                              <a href="ubah_data_mesin_inventori.php" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="hapus_data_mesin_inventori.php" class="btn btn-danger btn-xs" onclick="return konfirmasiHapus()"><i class="fa fa-trash-o "></i></a>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                  <!-- END DIV TABLE -->

                </div>
          		</div>
          	</div>

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2018 - Mega Yunita Sari
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <!--script for this page-->

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      function konfirmasiHapus(){

        var konfirmasi = confirm("Apakah Anda yakin akan menghapus data ini?");
        if(konfirmasi){
          return true;
        }else{
          return false;
        }

        return;
      }

  </script>

  </body>
</html>
