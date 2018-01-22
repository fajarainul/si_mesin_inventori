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
            <h3><i class="fa fa-angle-right"></i> Data Jenis Mesin</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="showback">
                        <h4><i class="fa fa-angle-right"></i> Tabel Jenis Mesin</h4>
                        <hr>

                        <?php

                        if(isset($_SESSION['success'])){

                            if($_SESSION['success']) {

                                echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';

                            }else{
                                echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';
                            }

                            unset($_SESSION['success']);
                            unset($_SESSION['message']);

                        }

                        ?>

                        <div>
                            <a href="tambah_data_jenis_mesin.php" class="btn btn-primary" style="float: right;">Tambah
                                Jenis Mesin</a>
                        </div>


                        <div class="clearfix"></div>
                        <!-- DIV TABLE -->
                        <div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Mesin</th>
                                    <th>Kode Mesin</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                    $jenisMesinController = new JenisMesinController();
                                    $listData = $jenisMesinController->retrieve();

                                    if($listData->num_rows<=0){
                                        echo "<tr><td colspan='4'></td>Data Jenis Mesin Kosong</tr>";
                                    }else{
                                        $no = 0;
                                        while ($data = $listData->fetch_object(JenisMesinModel::class)){
                                            echo "<tr>";
                                            echo "<td>".$no++."</td>";
                                            echo "<td>".$data->getNamaJenisMesin()."</td>";
                                            echo "<td>".$data->getKodeJenisMesin()."</td>";
                                            echo "<td>
                                                        <a href=\"ubah_data_jenis_mesin.php?id_jenis_mesin=".$data->getIdJenisMesin()."&nama_jenis_mesin=".$data->getNamaJenisMesin()."&kode_jenis_mesin=".$data->getKodeJenisMesin()."\" class=\"btn btn-primary btn-xs\"><i
                                                                    class=\"fa fa-pencil\"></i></a>
                                                        <a href=\"hapus_data_jenis_mesin.php\" class=\"btn btn-danger btn-xs\"><i
                                                                    class=\"fa fa-trash-o \"></i></a>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                        die();

                                    }

                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DIV TABLE -->

                    </div>
                </div>
            </div>

        </section>
        <! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->

</section>
<?php
include '_footer.php.php';
?>

<?php
include '_js.php';
?>


<!--script for this page-->

<script>
    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

    function konfirmasiHapus() {

        var konfirmasi = confirm("Apakah Anda yakin akan menghapus data ini?");
        if (konfirmasi) {
            return true;
        } else {
            return false;
        }

        return;
    }

</script>

</body>
</html>
