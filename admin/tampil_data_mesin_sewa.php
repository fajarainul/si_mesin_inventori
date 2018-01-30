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
                  <h4><i class="fa fa-angle-right"></i> Tabel Mesin Sewa</h4>
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
                    <a href="tambah_data_mesin_sewa.php" class="btn btn-primary" style="float: right;margin-bottom:20px">Tambah Mesin Sewa</a>
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
                            <th>Tanggal Keluar</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>1</td>
                              <td>SNS-01-2018</td>
                              <td>Single Needle</td>
                              <td>Line 2</td>
                              <td>Baik</td>
                              <td>10 Desember 2017</td>
                              <td>10 Desember 2018</td>
                            <td>
                              <a href="ubah_data_mesin_sewa.php" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="hapus_data_mesin_sewa.php" class="btn btn-danger btn-xs" onclick="return konfirmasiHapus()"><i class="fa fa-trash-o "></i></a>
                            </td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td>SNS-01-2018</td>
                              <td>Single Needle</td>
                              <td>Line 2</td>
                              <td>Baik</td>
                              <td>10 Desember 2017</td>
                              <td>10 Desember 2018</td>
                            <td>
                              <a href="ubah_data_mesin_sewa.php" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="hapus_data_mesin_sewa.php" class="btn btn-danger btn-xs" onclick="return konfirmasiHapus()"><i class="fa fa-trash-o "></i></a>
                            </td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td>SNS-01-2018</td>
                              <td>Single Needle</td>
                              <td>Line 2</td>
                              <td>Baik</td>
                              <td>10 Desember 2017</td>
                              <td>10 Desember 2018</td>
                            <td>
                              <a href="ubah_data_mesin_sewa.php" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="hapus_data_mesin_sewa.php" class="btn btn-danger btn-xs" onclick="return konfirmasiHapus()"><i class="fa fa-trash-o "></i></a>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                  <!-- END DIV TABLE -->

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
