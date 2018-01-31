<?php
session_start();

require_once '../classes/controller/JenisMesinController.php';
require_once '../classes/model/JenisMesinModel.php';

$idMesinSewa = $_GET['id_mesin'];
$noMesinSewa = $_GET['no_mesin'];
$idJenisMesin = $_GET['id_jenis_mesin'];
$lokasiMesin = $_GET['lokasi_mesin'];
$tanggalMasuk = $_GET['tgl_masuk'];
$tanggalKeluar = $_GET['tgl_keluar'];
$statusMesin = $_GET['status_mesin'];
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
                  <h4><i class="fa fa-angle-right"></i> Ubah Mesin Sewa</h4>
                  <hr>
                  <!-- DIV FORMS -->
                  <div class="text-right">
                    <form action="proses_mesin_sewa.php?aksi=edit&id=<?php echo $idMesinSewa?>" method="post">
                      <div class="form-group row">

                        <label for="nomorMesin" class="col-sm-2 col-form-label">Nomor Mesin Sewa</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="nomorMesin" placeholder="Nomor Mesin Sewa" name="nomorMesinSewa" value="<?php echo $noMesinSewa;?>" required="required">
                        </div>

                        <label for="jenisMesinSewa" class="col-sm-2 col-form-label">Jenis Mesin</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="jenisMesinSewa" name="jenisMesinSewa"
                                    required="required">
                            <?php

                            $jenisMesinController = new JenisMesinController();
                            $listData = $jenisMesinController->retrieve();

                            while ($data = $listData->fetch_object(JenisMesinModel::class)) {

                                //cek jenis mesin yang dipilih sebelumnya
                                if ($data->getIdJenisMesin() == $idJenisMesin) {
                                    $selected = 'selected';
                                }else{
                                    $selected = '';
                                }

                                echo "<option value=" . $data->getIdJenisMesin() . " " . $selected . ">" . $data->getNamaJenisMesin() . "</option>";
                            }

                            ?>
                            </select>
                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="lokasiMesin" class="col-sm-2 col-form-label">Lokasi Mesin Sewa</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="lokasiMesin" placeholder="Lokasi Mesin Sewa" name="lokasiMesinSewa" value="<?php echo $lokasiMesin;?>" required="required">
                        </div>

                        <label for="statusMesin" class="col-sm-2 col-form-label">Status Mesin</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="statusMesin" name="statusMesinSewa"
                                    required="required">

                            <option value="1" <?php echo $statusMesin == 1 ? 'selected' : '' ?> >Baik</option>
                            <option value="2" <?php echo $statusMesin == 2 ? 'selected' : '' ?> >Perlu Perbaikan</option>
                            <option value="5" <?php echo $statusMesin == 5 ? 'selected' : '' ?> >Rusak Total</option>

                            </select>
                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="tglMasuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-4">
                            <?php
                                $tanggalMasuk = date("d F Y", strtotime($tanggalMasuk) );
                            ?>
                          <input type="text" class="form-control" id="tglMasuk" placeholder="Tanggal Masuk" name="tanggalMasukMesinSewa" value="<?php echo $tanggalMasuk?>" required="required">
                        </div>

                        <label for="tglKeluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                        <div class="col-sm-4">
                            <?php
                                if($tanggalKeluar!="" && $tanggalKeluar!=null){
                                    $tanggalKeluar = date("d F Y", strtotime($tanggalKeluar) );
                                }else{
                                    $tanggalKeluar = "";
                                }


                            ?>
                          <input type="text" class="form-control" id="tglKeluar" placeholder="Tanggal Keluar" name="tanggalKeluarMesinSewa" value="<?php echo $tanggalKeluar?>">
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

        $('#tglKeluar').datepicker({
            format: "dd MM yyyy",
            autoclose : true,
            startDate: $('#tglMasuk').val()
        });



    });

</script>

</body>
</html>