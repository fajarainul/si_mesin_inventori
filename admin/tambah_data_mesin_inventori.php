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
                  <h4><i class="fa fa-angle-right"></i> Tambah Mesin Inventori</h4>
                  <hr>
                  <!-- DIV FORMS -->
                  <div class="text-right">
                    <form>
                      <div class="form-group row">

                        <label for="nomorMesin" class="col-sm-2 col-form-label">Nomor Mesin Inventori</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="nomorMesin" placeholder="Nomor Mesin Inventori" name="nomorMesin">
                        </div>

                        <label for="jenisMesin" class="col-sm-2 col-form-label">Jenis Mesin</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="jenisMesin" placeholder="Jenis Mesin" name="jenisMesin">
                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="lokasiMesin" class="col-sm-2 col-form-label">Lokasi Mesin Inventori</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="lokasiMesin" placeholder="Lokasi Mesin Inventori" name="lokasiMesin">
                        </div>

                        <label for="statusMesin" class="col-sm-2 col-form-label">Status Mesin</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="statusMesin" placeholder="Status Mesin" name="statusMesin">
                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="tglMasuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="tglMasuk" placeholder="Tanggal Masuk" name="tglMasuk">
                        </div>

                        <label for="tglKeluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="tglKeluar" placeholder="Tanggal Keluar" name="tglKeluar">
                        </div>

                      </div>

                      <div class="form-group row">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- END DIV FORMS -->

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

  </script>

  </body>
</html>
