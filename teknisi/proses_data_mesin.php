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

            //jika status adalah sedang perbaikan (status = 3)
            if($mesinInventoriModel->getStatusMesinInventori()==3){
                $tanggalMulaiPerbaikan = date("Y-m-d H-i-s" );
                $mesinInventoriModel->setTanggalMulaiPerbaikan($tanggalMulaiPerbaikan);
            }
            //jika status adalah selesai perbaikan (status = 4)  atau rusak (status = 5)
            else if ($mesinInventoriModel->getStatusMesinInventori()==4 || $mesinInventoriModel->getStatusMesinInventori()==5){
                $tanggalSelesaiPerbaikan = date("Y-m-d H-i-s" );
                $mesinInventoriModel->setTanggalSelesaiPerbaikan($tanggalSelesaiPerbaikan);
            }

            $result = $mesinInventoriController->updateTeknisi($mesinInventoriModel);

        }else if($tipeMesin=="sewa"){
            $mesinSewaController = new MesinSewaController();
            $mesinSewaModel = new MesinSewaModel();

            $mesinSewaModel->setStatusMesinSewa($_POST['statusMesin']);
            $mesinSewaModel->setIdMesinSewa($_GET['id']);

            //jika status adalah sedang perbaikan (status = 3)
            if($mesinSewaModel->getStatusMesinSewa()==3){
                $tanggalMulaiPerbaikan = date("Y-m-d H-i-s" );
                $tanggalSelesaiPerbaikan = "NULL";

                $mesinSewaModel->setTanggalMulaiPerbaikan($tanggalMulaiPerbaikan);
                $mesinSewaModel->setTanggalSelesaiPerbaikan($tanggalSelesaiPerbaikan);
            }
            //jika status adalah selesai perbaikan (status = 4)  atau rusak (status = 5)
            else if ($mesinSewaModel->getStatusMesinSewa()==4 || $mesinSewaModel->getStatusMesinSewa()==5){
                $tanggalSelesaiPerbaikan = date("Y-m-d H-i-s" );
                $mesinSewaModel->setTanggalSelesaiPerbaikan($tanggalSelesaiPerbaikan);
            }

            $result = $mesinSewaController->updateTeknisi($mesinSewaModel);

        }


        break;

}


$_SESSION['message'] = $result->getMessage();
$_SESSION['success'] = $result->getisSuccess();

header("Location: tampil_data_mesin.php");

?>