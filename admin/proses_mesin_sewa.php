<?php

session_start();

require_once '../classes/controller/MesinSewaController.php';
require_once '../classes/model/MesinSewaModel.php';
require_once '../classes/Result.php';

$aksi = $_GET['aksi'];

$mesinSewaController = new MesinSewaController();
$mesinSewaModel = new MesinSewaModel();
$result = new Result();


switch ($aksi){
    case 'insert':
        $tglMasuk = $_POST['tanggalMasukMesinSewa'];
        $tglKeluar = $_POST['tanggalKeluarMesinSewa'];

        $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );
        $tglKeluar = date("Y-m-d", strtotime($tglKeluar) );

        $mesinSewaModel->setNomorMesinSewa($_POST['nomorMesinSewa']);
        $mesinSewaModel->setIdJenisMesin($_POST['jenisMesinSewa']);
        $mesinSewaModel->setLokasiMesinSewa($_POST['lokasiMesinSewa']);
        $mesinSewaModel->setStatusMesinSewa($_POST['statusMesinSewa']);
        $mesinSewaModel->setTanggalMasukMesinSewa($tglMasuk);
        $mesinSewaModel->setTanggalKeluarMesinSewa($tglKeluar);

        $result = $mesinSewaController->create($mesinSewaModel);

        break;

    case 'edit':

        $tglMasuk = $_POST['tanggalMasukMesinInventori'];

        $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );

        $mesinSewaModel->setNomorMesinInventori($_POST['nomorMesinInventori']);
        $mesinSewaModel->setIdJenisMesin($_POST['jenisMesinInventori']);
        $mesinSewaModel->setLokasiMesinInventori($_POST['lokasiMesinInventori']);
        $mesinSewaModel->setStatusMesinInventori($_POST['statusMesinInventori']);
        $mesinSewaModel->setTanggalMasukMesinInventori($tglMasuk);
        $mesinSewaModel->setIdMesinInventori($_GET['id']);


        $result = $mesinSewaController->update($mesinSewaModel);

        break;

    case 'delete':
        $mesinSewaModel->setIdMesinInventori($_GET['id_mesin']);
        $mesinSewaModel->setNomorMesinInventori($_GET['no_mesin']);

        $result = $mesinSewaController->delete($mesinSewaModel);

        break;

}


$_SESSION['message'] = $result->getMessage();
$_SESSION['success'] = $result->getisSuccess();

header("Location: tampil_data_mesin_sewa.php");

?>