<?php
require_once '../classes/controller/JenisMesinController.php';
require_once '../classes/model/JenisMesinModel.php';

if(isset($_GET['id_mesin'])){
    $idMesinInventori = $_GET['id_mesin'];
    $noMesinInventori = $_GET['no_mesin'];
    $idJenisMesin = $_GET['id_jenis_mesin'];
    $lokasiMesin = $_GET['lokasi_mesin'];
    $tanggalMasuk = $_GET['tgl_masuk'];
    $statusMesin = $_GET['status_mesin'];
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
            <h3><i class="fa fa-angle-right"></i> Data Mesin Inventori</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="showback">
                        <h4><i class="fa fa-angle-right"></i> Ubah Mesin Inventori</h4>
                        <hr>
                        <?php

                        if(isset($_SESSION['success'])){

                            if(!$_SESSION['success']) {

                                echo '<div class="alert alert-danger">'.$_SESSION['message'].'<br><br>';

                                $errors = $_SESSION['errors'];
                                if(sizeof($errors)>0){

                                    foreach ($errors as $error){
                                        echo $error;echo '<br>';
                                    }

                                }

                                echo '</div>';

                                $entries = $_SESSION['entries'];

                            }

                            if(isset($entries)){
                                $idMesinInventori = $entries['idMesinInventori'];
                                $noMesinInventori = $entries['nomorMesinInventori'];
                                $idJenisMesin = $entries['jenisMesinInventori'];
                                $lokasiMesin = $entries['lokasiMesinInventori'];
                                $tanggalMasuk = $entries['tanggalMasukMesinInventori'];
                                $statusMesin = $entries['statusMesinInventori'];
                            }

                            unset($_SESSION['success']);
                            unset($_SESSION['message']);
                            unset($_SESSION['errors']);
                            unset($_SESSION['entries']);

                        }

                        ?>
                        <!-- DIV FORMS -->
                        <div class="text-right">
                            <form action="proses_mesin_inventori.php?aksi=edit&id=<?php echo isset($idMesinInventori)?$idMesinInventori:'' ;?>" method="post">
                                <div class="form-group row">

                                    <label for="nomorMesin" class="col-sm-2 col-form-label">Nomor Mesin
                                        Inventori</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nomorMesin"
                                               placeholder="Nomor Mesin Inventori" name="nomorMesinInventori" value="<?php echo isset($noMesinInventori)?$noMesinInventori:'' ;?>" required="required">
                                    </div>

                                    <label for="jenisMesin" class="col-sm-2 col-form-label">Jenis Mesin</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="jenisMesin" name="jenisMesinInventori"
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

                                    <label for="lokasiMesin" class="col-sm-2 col-form-label">Lokasi Mesin
                                        Inventori</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="lokasiMesin"
                                               placeholder="Lokasi Mesin Inventori" name="lokasiMesinInventori" value="<?php echo isset($lokasiMesin)?$lokasiMesin:'' ;?>" required="required">
                                    </div>

                                    <label for="statusMesin" class="col-sm-2 col-form-label">Status Mesin</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="statusMesin" name="statusMesinInventori"
                                                required="required">

                                            <option value="1" <?php echo isset($statusMesin) && $statusMesin == 1 ? 'selected' : '' ?> >Baik</option>
                                            <option value="2" <?php echo isset($statusMesin) && $statusMesin == 2 ? 'selected' : '' ?> >Perlu Perbaikan</option>
                                            <option value="5" <?php echo isset($statusMesin) && $statusMesin == 5 ? 'selected' : '' ?> >Rusak Total</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="tglMasuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-4">
                                        <?php
                                            if(isset($tanggalMasuk) && !empty($tanggalMasuk)){
                                                $tanggalMasuk = date("d F Y", strtotime($tanggalMasuk) );
                                            }
                                        ?>
                                        <input type="text" class="form-control datepicker" id="tglMasuk"
                                               placeholder="Tanggal Masuk" name="tanggalMasukMesinInventori" value="<?php echo isset($tanggalMasuk)?$tanggalMasuk:'' ;?>" required="required">
                                    </div>

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

<script>

    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: "dd MM yyyy"
        });
    });

</script>


</body>
</html>