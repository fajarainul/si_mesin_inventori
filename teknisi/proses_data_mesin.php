<?php

session_start();

require_once '../classes/controller/MesinInventoriController.php';
require_once '../classes/model/MesinInventoriModel.php';
require_once '../classes/controller/MesinSewaController.php';
require_once '../classes/model/MesinSewaModel.php';
require_once '../classes/Result.php';

$aksi = $_GET['aksi'];
$tipeMesin = $_GET['tipe_mesin'];

$result = new Result();


switch ($aksi){
    case 'edit':

        if($tipeMesin=="inventori"){
            $mesinInventoriController = new MesinInventoriController();
            $mesinInventoriModel = new MesinInventoriModel();

            $mesinInventoriModel->setStatusMesinInventori($_POST['statusMesin']);
            $mesinInventoriModel->setIdMesinInventori($_GET['id']);

            $result = $mesinInventoriController->updateTeknisi($mesinInventoriModel);

        }else if($tipeMesin=="sewa"){
            $mesinSewaController = new MesinSewaController();
            $mesinSewaModel = new MesinSewaModel();

            $mesinSewaModel->setStatusMesinSewa($_POST['statusMesin']);
            $mesinSewaModel->setIdMesinSewa($_GET['id']);

            $result = $mesinSewaController->updateTeknisi($mesinSewaModel);

        }


        break;

}


$_SESSION['message'] = $result->getMessage();
$_SESSION['success'] = $result->getisSuccess();

header("Location: tampil_data_mesin.php");

?>