<?php
session_start();

require_once '../classes/controller/JenisMesinController.php';
require_once '../classes/model/JenisMesinModel.php';

$idMesin = $_GET['id_mesin'];
$tipeMesin = $_GET['tipe_mesin'];
$statusMesin = $_GET['status_mesin'];
$noMesin = $_GET['no_mesin'];
$idJenisMesin = $_GET['id_jenis_mesin'];
$lokasiMesin = $_GET['lokasi_mesin'];
$tanggalMasuk = $_GET['tgl_masuk'];

if($tipeMesin=="sewa"){
    $tanggalKeluar = $_GET['tgl_keluar'];
}

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
            <h3><i class="fa fa-angle-right"></i> Data Mesin</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="showback">
                        <h4><i class="fa fa-angle-right"></i> Ubah Data Mesin</h4>
                        <hr>
                        <!-- DIV FORMS -->
                        <div class="text-right">
                            <form action="proses_data_mesin.php?aksi=edit&id=<?php echo $idMesin?>&tipe_mesin=<?php echo $tipeMesin?>" method="post">
                                <div class="form-group row">

                                    <label for="nomorMesin" class="col-sm-2 col-form-label">Nomor Mesin</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nomorMesin"
                                               placeholder="Nomor Mesin" name="nomorMesin" value="<?php echo $noMesin;?>" required="required" disabled="disabled">
                                    </div>

                                    <label for="jenisMesin" class="col-sm-2 col-form-label">Jenis Mesin</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="jenisMesin" name="jenisMesin"
                                                required="required"disabled="disabled">

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

                                    <label for="lokasiMesin" class="col-sm-2 col-form-label">Lokasi Mesin</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="lokasiMesin"
                                               placeholder="Lokasi Mesin" name="lokasiMesin" value="<?php echo $lokasiMesin?>" required="required" disabled="disabled">
                                    </div>

                                    <label for="statusMesin" class="col-sm-2 col-form-label">Status Mesin</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="statusMesin" name="statusMesin"
                                                required="required">
                                            <option value="3" <?php echo $statusMesin == 3 ? 'selected' : '' ?> >Sedang Diperbaiki</option>
                                            <option value="4" <?php echo $statusMesin == 4 ? 'selected' : '' ?> >Selesai Diperbaiki</option>
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
                                        <input type="text" class="form-control datepicker" id="tglMasuk"
                                               placeholder="Tanggal Masuk" name="tanggalMasukMesin" value="<?php echo $tanggalMasuk?>" required="required" disabled="disabled">
                                    </div>

                                    <?php
                                        if($tipeMesin=="sewa") {


                                            ?>

                                            <label for="tglKeluar" class="col-sm-2 col-form-label">Tanggal
                                                Keluar</label>
                                            <div class="col-sm-4">
                                                <?php
                                                if ($tanggalKeluar != "" && $tanggalKeluar != null) {
                                                    $tanggalKeluar = date("d F Y", strtotime($tanggalKeluar));
                                                } else {
                                                    $tanggalKeluar = "";
                                                }


                                                ?>
                                                <input type="text" class="form-control" id="tglKeluar"
                                                       placeholder="Tanggal Keluar" name="tanggalKeluarMesin"
                                                       value="<?php echo $tanggalKeluar ?>" disabled="disabled">
                                            </div>


                                            <?php
                                            }
                                        ?>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary" style="float: right;">Ubah
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END DIV FORMS -->

                    </div>
                </div>
            </div>

        </section>
        <! --/wrapper -->
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