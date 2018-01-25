<?php
session_start();

require_once '../classes/controller/JenisMesinController.php';
require_once '../classes/model/JenisMesinModel.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
include '_header.php';
?>

<body>

<section id="container">

    <?php
    include '_navbar.php';
    ?>

    <?php
    include '_sidebar.php';
    ?>

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
                  <h4><i class="fa fa-angle-right"></i> Ubah Mesin Inventori</h4>
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

                      </div>

                      <div class="form-group row">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary" style="float: right;">Ubah</button>
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

</section>
<?php
include '_footer.php';
?>

<?php
include '_js.php';
?>


</body>
</html>