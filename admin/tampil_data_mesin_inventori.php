<?php
require_once '../classes/controller/MesinInventoriController.php';
require_once '../classes/model/MesinInventoriModel.php';

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
                        <h4><i class="fa fa-angle-right"></i> Tabel Mesin Inventori</h4>
                        <hr>

                        <?php

                        if (isset($_SESSION['success'])) {

                            if ($_SESSION['success']) {

                                echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';

                            } else {
                                echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
                            }

                            unset($_SESSION['success']);
                            unset($_SESSION['message']);

                        }

                        ?>

                        <div>
                            <a href="tambah_data_mesin_inventori.php" class="btn btn-primary"
                               style="float: right; margin-bottom:20px">Tambah Mesin Inventori</a>
                        </div>
                        <div class="clearfix"></div>
                        <!-- DIV TABLE -->
                        <div>
                            <table class="table" id="tableMesinInventori">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Mesin</th>
                                    <th>Jenis Mesin</th>
                                    <th>Lokasi Mesin</th>
                                    <th>Status Mesin</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $mesinInventoriController = new MesinInventoriController();
                                $listData = $mesinInventoriController->retrieve();

                                if ($listData->num_rows <= 0) {
                                    echo "<tr><td colspan='7'>Data Mesin Inventori Kosong</td></tr>";
                                } else {
                                    $no = 1;
                                    while ($data = $listData->fetch_object(MesinInventoriModel::class)) {
                                        if($data->getStatusMesinInventori()==1){
                                            $classLabel = "primary";
                                            $statusText = "Baik";
                                        }else if($data->getStatusMesinInventori()==2) {
                                            $classLabel = "warning";
                                            $statusText = "Perlu Perbaikan";
                                        }else if($data->getStatusMesinInventori()==3){
                                            $classLabel = "info";
                                            $statusText = "Sedang Diperbaiki";
                                        }else if($data->getStatusMesinInventori()==4){
                                            $classLabel = "success";
                                            $statusText = "Selesai Diperbaiki";
                                        }
                                        else if($data->getStatusMesinInventori()==5){
                                            $classLabel = "danger";
                                            $statusText ="Rusak Total";
                                        }

                                        $tglMasuk = date("d F Y", strtotime($data->getTanggalMasukMesinInventori()) );


                                        echo "<tr>";

                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $data->getNomorMesinInventori() . "</td>";
                                        echo "<td>" . $data->nama_jenis_mesin . "</td>";
                                        echo "<td>" . $data->getLokasiMesinInventori() . "</td>";
                                        echo "<td><span class=\"label label-".$classLabel."\">" . $statusText . "</span></td>";
                                        echo "<td>" . $tglMasuk . "</td>";

                                        echo "<td>
                                                        <a href=\"ubah_data_mesin_inventori.php?no_mesin=".$data->getNomorMesinInventori()."&id_jenis_mesin=".$data->getIdJenisMesin()."&lokasi_mesin=".$data->getLokasiMesinInventori()."&id_mesin=".$data->getIdMesinInventori()."&tgl_masuk=".$data->getTanggalMasukMesinInventori()."&status_mesin=".$data->getStatusMesinInventori()."\" class=\"btn btn-primary btn-xs\"><i
                                                        class=\"fa fa-pencil\"></i></a>
                                                        <a href=\"proses_mesin_inventori.php?aksi=delete&no_mesin=".$data->getNomorMesinInventori()."&id_mesin=".$data->getIdMesinInventori()."&status_mesin=".$data->getStatusMesinInventori()."\" class=\"btn btn-danger btn-xs\" onclick=\"return konfirmasiHapus()\"><i class=\"fa fa-trash-o \"></i></a>
                                              </td>";

                                        echo "</tr>";
                                    }

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
include '_footer.php';
?>

<?php
include '_js.php';
?>

<script>

    $(document).ready(function() {
        $('#tableMesinInventori').DataTable();
    } );

</script>

<script>

    function konfirmasiHapus() {

        var konfirmasi = confirm("Apakah Anda yakin akan menghapus data ini?");
        if (konfirmasi) {
            return true;
        } else {
            return false;
        }

    }

</script>


</body>
</html>