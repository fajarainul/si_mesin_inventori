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
                    <form action="proses_mesin_sewa.php?aksi=insert" method="post">
                      <div class="form-group row">

                        <label for="nomorMesin" class="col-sm-2 col-form-label">Nomor Mesin Sewa</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="nomorMesin" placeholder="Nomor Mesin Sewa" name="nomorMesinSewa" required="required">
                        </div>

                        <label for="jenisMesin" class="col-sm-2 col-form-label">Jenis Mesin</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="jenisMesin" name="jenisMesinSewa"
                                    required="required">

                                <?php

                                $jenisMesinController = new JenisMesinController();
                                $listData = $jenisMesinController->retrieve();

                                while ($data = $listData->fetch_object(JenisMesinModel::class)) {
                                    echo "<option value=" . $data->getIdJenisMesin() . ">" . $data->getNamaJenisMesin() . "</option>";
                                }

                                ?>

                            </select>
                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="lokasiMesin" class="col-sm-2 col-form-label">Lokasi Mesin Sewa</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="lokasiMesin" placeholder="Lokasi Mesin Sewa" name="lokasiMesinSewa" required="required">
                        </div>

                        <label for="statusMesin" class="col-sm-2 col-form-label">Status Mesin</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="statusMesin" name="statusMesinSewa" required="required">
                                <option value="1">Baik</option>
                                <option value="2">Perlu Perbaikan</option>
                                <option value="5">Rusak Total</option>
                            </select>
                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="tglMasuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control datepicker" id="tglMasuk" placeholder="Tanggal Masuk" name="tanggalMasukMesinSewa" required="required">
                        </div>

                        <label for="tglKeluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="tglKeluar" placeholder="Tanggal Keluar" name="tanggalKeluarMesinSewa">
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

<script>

    $(document).ready(function () {
        /*$('.datepicker').datepicker({
            format: "dd MM yyyy"
        });*/

        var startDate;

        $('#tglMasuk').datepicker({
            format: "dd MM yyyy",
            autoclose : true
        }).on('changeDate', function(e) {
            startDate = e.date;

            $('#tglKeluar').val("");
            $('#tglKeluar').datepicker({
                format: "dd MM yyyy",
                autoclose : true,
                startDate: startDate
            });

        });





    });

</script>


</body>
</html>