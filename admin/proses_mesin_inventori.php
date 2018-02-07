<?php

session_start();

require_once '../classes/controller/MesinInventoriController.php';
require_once '../classes/model/MesinInventoriModel.php';
require_once '../classes/Result.php';
require_once '../classes/validation/FormValidator.php';
require_once '../classes/validation/ValidationRule.php';

$aksi = $_GET['aksi'];

$mesinInventoriController = new MesinInventoriController();
$mesinInventoriModel = new MesinInventoriModel();
$result = new Result();
$validator = new FormValidator();

$errors = array();


switch ($aksi){
    case 'insert':
        $validator->addRule('nomorMesinInventori', 'Nomor mesin inventori mesin harus diisi', 'required');
        $validator->addRule('jenisMesinInventori', 'Jenis mesin inventori harus diisi', 'required');
        $validator->addRule('lokasiMesinInventori', 'Lokasi mesin inventori harus diisi', 'required');
        $validator->addRule('statusMesinInventori', 'Status mesin inventori harus diisi', 'required');
        $validator->addRule('tanggalMasukMesinInventori', 'Tanggal masuk mesin inventori harus diisi', 'required');

        $validator->addEntries($_POST);
        $validator->validate();

        $entries = $validator->getEntries();


        if ($validator->foundErrors()) {

            $errors = $validator->getErrors();
            $result->setMessage("Ooopss, terjadi error. Lihat pesan dibawah");
            $result->setIsSuccess(false);

        }else{

            $tglMasuk = $entries['tanggalMasukMesinInventori'];

            $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );

            $mesinInventoriModel->setNomorMesinInventori($entries['nomorMesinInventori']);
            $mesinInventoriModel->setIdJenisMesin($entries['jenisMesinInventori']);
            $mesinInventoriModel->setLokasiMesinInventori($entries['lokasiMesinInventori']);
            $mesinInventoriModel->setStatusMesinInventori($entries['statusMesinInventori']);
            $mesinInventoriModel->setTanggalMasukMesinInventori($tglMasuk);

            $result = $mesinInventoriController->create($mesinInventoriModel);
        }

        break;

    case 'edit':
        $validator->addRule('nomorMesinInventori', 'Nomor mesin inventori mesin harus diisi', 'required');
        $validator->addRule('jenisMesinInventori', 'Jenis mesin inventori harus diisi', 'required');
        $validator->addRule('lokasiMesinInventori', 'Lokasi mesin inventori harus diisi', 'required');
        $validator->addRule('statusMesinInventori', 'Status mesin inventori harus diisi', 'required');
        $validator->addRule('tanggalMasukMesinInventori', 'Tanggal masuk mesin inventori harus diisi', 'required');

        $validator->addEntries($_POST);
        $validator->validate();

        $entries = $validator->getEntries();

        //print_r($entries);die();


        if ($validator->foundErrors()) {

            $errors = $validator->getErrors();
            $entries['idMesinInventori'] = $_GET['id'];
            $result->setMessage("Ooopss, terjadi error. Lihat pesan dibawah");
            $result->setIsSuccess(false);

        }else{

            $tglMasuk = $entries['tanggalMasukMesinInventori'];

            $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );

            $mesinInventoriModel->setNomorMesinInventori($entries['nomorMesinInventori']);
            $mesinInventoriModel->setIdJenisMesin($entries['jenisMesinInventori']);
            $mesinInventoriModel->setLokasiMesinInventori($entries['lokasiMesinInventori']);
            $mesinInventoriModel->setStatusMesinInventori($entries['statusMesinInventori']);
            $mesinInventoriModel->setTanggalMasukMesinInventori($tglMasuk);
            $mesinInventoriModel->setIdMesinInventori($_GET['id']);


            $result = $mesinInventoriController->update($mesinInventoriModel);
        }

        break;

    case 'delete':
        //jika status mesin = 3, maka tidak bisa dihapus
        if($_GET['status_mesin']==3){

            $result->setIsSuccess(false);
            $result->setMessage("Tidak bisa hapus data, karena status mesin sedang diperbaiki");
        }else{
            $mesinInventoriModel->setIdMesinInventori($_GET['id_mesin']);
            $mesinInventoriModel->setNomorMesinInventori($_GET['no_mesin']);
            $result = $mesinInventoriController->delete($mesinInventoriModel);
        }



        break;

}


$_SESSION['message'] = $result->getMessage();
$_SESSION['success'] = $result->getisSuccess();
$_SESSION['errors'] = $errors;
$_SESSION['entries'] = $entries;

if(sizeof($errors)<=0){
    header("Location: tampil_data_mesin_inventori.php");
}else{

    if($aksi=='insert'){
        header("Location: tambah_data_mesin_inventori.php");
    }else if ($aksi=='edit'){
        header("Location: ubah_data_mesin_inventori.php");
    }
}
?>