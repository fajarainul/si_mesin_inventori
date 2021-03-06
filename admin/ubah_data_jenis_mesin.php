<?php

if(isset($_GET['id_jenis_mesin'])){
    $kodeJenisMesin = $_GET['kode_jenis_mesin'];
    $namaJenisMesin = $_GET['nama_jenis_mesin'];
    $idJenisMesin = $_GET['id_jenis_mesin'];
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
            <h3><i class="fa fa-angle-right"></i> Data Jenis Mesin</h3>
          	<div class="row mt">
          		<div class="col-lg-6">
                <div class="showback">
                  <h4><i class="fa fa-angle-right"></i> Ubah Jenis Mesin</h4>
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
                            $kodeJenisMesin = $entries['kodeMesin'];
                            $namaJenisMesin = $entries['namaMesin'];
                            $idJenisMesin = $entries['idJenisMesin'];
                        }

                        unset($_SESSION['success']);
                        unset($_SESSION['message']);
                        unset($_SESSION['errors']);
                        unset($_SESSION['entries']);

                    }

                    ?>

                  <!-- DIV FORMS -->
                  <div>
                    <form method="POST" action="proses_jenis_mesin.php?aksi=edit&id=<?php echo isset($idJenisMesin)?$idJenisMesin:'' ;?>">
                      <div class="form-group row">
                        <label for="jenisMesin" class="col-sm-4 col-form-label">Nama Jenis Mesin</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namaMesin" name="namaMesin" placeholder="Nama Jenis Mesin" value="<?php echo isset($namaJenisMesin)? $namaJenisMesin : ''; ?>" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kodeMesin" class="col-sm-4 col-form-label">Kode Mesin</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="kodeMesin" name="kodeMesin" placeholder="Kode Mesin" value="<?php echo isset($kodeJenisMesin)?$kodeJenisMesin:'' ;?>" required="required">
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
    <?php
    include '_footer.php';
    ?>

    <?php
    include '_js.php';
    ?>


</body>
</html>