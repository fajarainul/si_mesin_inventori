<?php

session_start();

require_once '../classes/controller/MesinInventoriController.php';
require_once '../classes/model/MesinInventoriModel.php';
require_once '../classes/Result.php';

$aksi = $_GET['aksi'];

$mesinInventoriController = new MesinInventoriController();
$mesinInventoriModel = new MesinInventoriModel();
$result = new Result();


switch ($aksi){
    case 'insert':
        $tglMasuk = $_POST['tanggalMasukMesinInventori'];

        $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );

        $mesinInventoriModel->setNomorMesinInventori($_POST['nomorMesinInventori']);
        $mesinInventoriModel->setIdJenisMesin($_POST['jenisMesinInventori']);
        $mesinInventoriModel->setLokasiMesinInventori($_POST['lokasiMesinInventori']);
        $mesinInventoriModel->setStatusMesinInventori($_POST['statusMesinInventori']);
        $mesinInventoriModel->setTanggalMasukMesinInventori($tglMasuk);

        $result = $mesinInventoriController->create($mesinInventoriModel);

        break;

    case 'edit':

        $tglMasuk = $_POST['tanggalMasukMesinInventori'];

        $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );

        $mesinInventoriModel->setNomorMesinInventori($_POST['nomorMesinInventori']);
        $mesinInventoriModel->setIdJenisMesin($_POST['jenisMesinInventori']);
        $mesinInventoriModel->setLokasiMesinInventori($_POST['lokasiMesinInventori']);
        $mesinInventoriModel->setStatusMesinInventori($_POST['statusMesinInventori']);
        $mesinInventoriModel->setTanggalMasukMesinInventori($tglMasuk);
        $mesinInventoriModel->setIdMesinInventori($_GET['id']);


        $result = $mesinInventoriController->update($mesinInventoriModel);

        break;

    case 'delete':
        $mesinInventoriModel->setIdJenisMesin($_GET['id']);

        $result = $mesinInventoriController->delete($mesinInventoriModel);

        break;

}


$_SESSION['message'] = $result->getMessage();
$_SESSION['success'] = $result->getisSuccess();

header("Location: tampil_data_mesin_inventori.php");

?>