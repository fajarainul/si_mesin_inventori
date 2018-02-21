<html>

<head>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>

<body>

    <div style="text-align: center">

        <p><span style="font-size: 16px"><b>Data Laporan Mesin Inventori dan Mesin Sewa</b></span>
            <br>PT Fast Manufacturing
            <br><span style="font-size: 12px">JL Walisongo, Km 11, Kawasan, Tambakaji, Ngaliyan
            <br>Kota Semarang, Jawa Tengah 50185</span>
        </p>


    </div>

    <div style="margin-top: 30px; padding-left: 20px;padding-right: 20px">

        <p style="font-size: 20px"><b>Mesin Inventori</b></p>
        <table class="table table-bordered" style="font-size: 12px">

            <thead style="font-size: 14px">
            <tr>
                <th>No</th>
                <th>Nomor Mesin</th>
                <th>Jenis Mesin</th>
                <th>Lokasi Mesin</th>
                <th>Status Mesin</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Mulai Perbaikan</th>
                <th>Tanggal Selesai Perbaikan</th>
            </tr>
            </thead>
            <tbody>

            <?php
            require_once '../classes/controller/MesinInventoriController.php';
            require_once '../classes/model/MesinInventoriModel.php';

            $mesinInventoriController = new MesinInventoriController();
            $listData = $mesinInventoriController->retrieve();

            if ($listData->num_rows <= 0) {
                echo "<tr><td colspan='7'>Data Mesin Inventori Kosong</td></tr>";
            } else {
                $no = 1;
                while ($data = $listData->fetch_object(MesinInventoriModel::class)) {
                    if($data->getStatusMesinInventori()==1){
                        $bgColor = "#428bca";
                        $statusText = "Baik";
                    }else if($data->getStatusMesinInventori()==2) {
                        $bgColor = "#f0ad4e";
                        $statusText = "Perlu Perbaikan";
                    }else if($data->getStatusMesinInventori()==3){
                        $bgColor = "info";
                        $statusText = "#5bc0de";
                    }else if($data->getStatusMesinInventori()==4){
                        $bgColor = "#5cb85c";
                        $statusText = "Selesai Diperbaiki";
                    }
                    else if($data->getStatusMesinInventori()==5){
                        $bgColor = "#d9534f";
                        $statusText ="Rusak Total";
                    }

                    $tglMasuk = date("d F Y", strtotime($data->getTanggalMasukMesinInventori()) );

                    if($data->getTanggalMulaiPerbaikan()!=null){
                        $tglMulaiPerbaikan = date("d F Y", strtotime($data->getTanggalMulaiPerbaikan()) );
                    }else{
                        $tglMulaiPerbaikan = "-";
                    }

                    if($data->getTanggalSelesaiPerbaikan()!=null){
                        $tglSelesaiPerbaikan = date("d F Y", strtotime($data->getTanggalSelesaiPerbaikan()) );
                    }else{
                        $tglSelesaiPerbaikan = "-";
                    }

                    echo "<tr>";

                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $data->getNomorMesinInventori() . "</td>";
                    echo "<td>" . $data->nama_jenis_mesin . "</td>";
                    echo "<td>" . $data->getLokasiMesinInventori() . "</td>";
                    echo "<td style='background-color: ".$bgColor.";color:white'>" . $statusText . "</td>";
                    echo "<td>" . $tglMasuk . "</td>";
                    echo "<td>" . $tglMulaiPerbaikan . "</td>";
                    echo "<td>" . $tglSelesaiPerbaikan . "</td>";
                    echo "</tr>";
                }

            }

            ?>

            </tbody>

        </table>
        <div style="float: right;margin-right: 300px">
            <?php
                $currentDate = date("d m Y");


            ?>
            <div style="text-align: center">
                <p>Semarang, <?php echo tgl_indo($currentDate)?></p>
                <p>Kepala Divisi Logistik,</p>
                <br>
                <br>
                <p>Mohammad Fajar</p>
            </div>


        </div>

        <div class="clearfix"></div>

        <div style="text-align: center;page-break-before: always;">

            <p><span style="font-size: 16px"><b>Data Laporan Mesin Inventori dan Mesin Sewa</b></span>
                <br>PT Fast Manufacturing
                <br><span style="font-size: 12px">JL Walisongo, Km 11, Kawasan, Tambakaji, Ngaliyan
            <br>Kota Semarang, Jawa Tengah 50185</span>
            </p>


        </div>

        <p style="font-size: 20px"><b>Mesin Sewa</b></p>
        <table class="table table-bordered" style="font-size: 12px">

            <thead style="font-size: 14px">
            <tr>
                <th>No</th>
                <th>Nomor Mesin</th>
                <th>Jenis Mesin</th>
                <th>Lokasi Mesin</th>
                <th>Status Mesin</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Tanggal Mulai Perbaikan</th>
                <th>Tanggal Selesai Perbaikan</th>
            </tr>
            </thead>
            <tbody>

            <?php
            require_once '../classes/controller/MesinSewaController.php';
            require_once '../classes/model/MesinSewaModel.php';

            $mesinSewaController = new MesinSewaController();
            $listData = $mesinSewaController->retrieve();

            if ($listData->num_rows <= 0) {
                echo "<tr><td colspan='8'>Data Mesin Sewa Kosong</td></tr>";
            } else {
                $no = 1;
                while ($data = $listData->fetch_object(MesinSewaModel::class)) {
                    if($data->getStatusMesinSewa()==1){
                        $bgColor = "#428bca";
                        $statusText = "Baik";
                    }else if($data->getStatusMesinSewa()==2) {
                        $bgColor = "#f0ad4e";
                        $statusText = "Perlu Perbaikan";
                    }else if($data->getStatusMesinSewa()==3){
                        $bgColor = "info";
                        $statusText = "#5bc0de";
                    }else if($data->getStatusMesinSewa()==4){
                        $bgColor = "#5cb85c";
                        $statusText = "Selesai Diperbaiki";
                    }
                    else if($data->getStatusMesinSewa()==5){
                        $bgColor = "#d9534f";
                        $statusText ="Rusak Total";
                    }

                    $tglMasuk = date("d F Y", strtotime($data->getTanggalMasukMesinSewa()) );

                    if($data->getTanggalKeluarMesinSewa()!=null){
                        $tglKeluar = date("d F Y", strtotime($data->getTanggalKeluarMesinSewa()) );
                    }else{
                        $tglKeluar = "-";
                    }

                    if($data->getTanggalMulaiPerbaikan()!=null){
                        $tglMulaiPerbaikan = date("d F Y", strtotime($data->getTanggalMulaiPerbaikan()) );
                    }else{
                        $tglMulaiPerbaikan = "-";
                    }

                    if($data->getTanggalSelesaiPerbaikan()!=null){
                        $tglSelesaiPerbaikan = date("d F Y", strtotime($data->getTanggalSelesaiPerbaikan()) );
                    }else{
                        $tglSelesaiPerbaikan = "-";
                    }



                    echo "<tr>";

                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $data->getNomorMesinSewa() . "</td>";
                    echo "<td>" . $data->nama_jenis_mesin . "</td>";
                    echo "<td>" . $data->getLokasiMesinSewa() . "</td>";
                    echo "<td style='background-color: ".$bgColor.";color:white'>" . $statusText . "</td>";
                    echo "<td>" . $tglMasuk . "</td>";
                    echo "<td>" . $tglKeluar . "</td>";
                    echo "<td>" . $tglMulaiPerbaikan . "</td>";
                    echo "<td>" . $tglSelesaiPerbaikan . "</td>";

                    echo "</tr>";
                }

            }

            ?>

            </tbody>

        </table>
        <div style="float: right;margin-right: 300px">
            <?php
            $currentDate = date("d m Y");


            ?>
            <div style="text-align: center">
                <p>Semarang, <?php echo tgl_indo($currentDate)?></p>
                <p>Kepala Divisi Logistik,</p>
                <br>
                <br>
                <p>Mohammad Fajar</p>
            </div>


        </div>

        <div class="clearfix"></div>

    </div>

</body>

</html>

<?php
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode(' ', $tanggal);

    return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
}