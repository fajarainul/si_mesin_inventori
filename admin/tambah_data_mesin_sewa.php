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
            <h3><i class="fa fa-angle-right"></i> Data Mesin Sewa</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                <div class="showback">
                  <h4><i class="fa fa-angle-right"></i> Tambah Mesin Sewa</h4>
                  <hr>
                  <!-- DIV FORMS -->
                  <div class="text-right">
                    <form>
                      <div class="form-group row">

                        <label for="nomorMesin" class="col-sm-2 col-form-label">Nomor Mesin Sewa</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="nomorMesin" placeholder="Nomor Mesin Sewa" name="nomorMesin">
                        </div>

                        <label for="jenisMesin" class="col-sm-2 col-form-label">Jenis Mesin</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="jenisMesin" placeholder="Jenis Mesin" name="jenisMesin">
                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="lokasiMesin" class="col-sm-2 col-form-label">Lokasi Mesin Sewa</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="lokasiMesin" placeholder="Lokasi Mesin Sewa" name="lokasiMesin">
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

</section>
<?php
include '_footer.php';
?>

<?php
include '_js.php';
?>


</body>
</html>