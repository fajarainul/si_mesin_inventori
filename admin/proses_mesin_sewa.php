<?php

session_start();

require_once '../classes/controller/MesinSewaController.php';
require_once '../classes/model/MesinSewaModel.php';
require_once '../classes/Result.php';
require_once '../classes/validation/FormValidator.php';
require_once '../classes/validation/ValidationRule.php';

$aksi = $_GET['aksi'];

$mesinSewaController = new MesinSewaController();
$mesinSewaModel = new MesinSewaModel();
$result = new Result();

$validator = new FormValidator();

$errors = array();


switch ($aksi){
    case 'insert':
        $validator->addRule('nomorMesinSewa', 'Nomor mesin sewa mesin harus diisi', 'required');
        $validator->addRule('jenisMesinSewa', 'Jenis mesin sewa harus diisi', 'required');
        $validator->addRule('lokasiMesinSewa', 'Lokasi mesin sewa harus diisi', 'required');
        $validator->addRule('statusMesinSewa', 'Status mesin sewa harus diisi', 'required');
        $validator->addRule('tanggalMasukMesinSewa', 'Tanggal masuk mesin sewa harus diisi', 'required');

        $validator->addEntries($_POST);
        $validator->validate();

        $entries = $validator->getEntries();


        if ($validator->foundErrors()) {

            $errors = $validator->getErrors();
            $result->setMessage("Ooopss, terjadi error. Lihat pesan dibawah");
            $result->setIsSuccess(false);

        }else{

            $tglMasuk = $entries['tanggalMasukMesinSewa'];
            $tglKeluar = $entries['tanggalKeluarMesinSewa'];

            $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );

            if($tglKeluar!=null && $tglKeluar!=""){
                $tglKeluar = date("Y-m-d", strtotime($tglKeluar) );
            }else{
                $tglKeluar = NULL;
            }


            $mesinSewaModel->setNomorMesinSewa($entries['nomorMesinSewa']);
            $mesinSewaModel->setIdJenisMesin($entries['jenisMesinSewa']);
            $mesinSewaModel->setLokasiMesinSewa($entries['lokasiMesinSewa']);
            $mesinSewaModel->setStatusMesinSewa($entries['statusMesinSewa']);
            $mesinSewaModel->setTanggalMasukMesinSewa($tglMasuk);
            $mesinSewaModel->setTanggalKeluarMesinSewa($tglKeluar);

            $result = $mesinSewaController->create($mesinSewaModel);

        }


        break;

    case 'edit':

        $validator->addRule('nomorMesinSewa', 'Nomor mesin sewa mesin harus diisi', 'required');
        $validator->addRule('jenisMesinSewa', 'Jenis mesin sewa harus diisi', 'required');
        $validator->addRule('lokasiMesinSewa', 'Lokasi mesin sewa harus diisi', 'required');
        $validator->addRule('statusMesinSewa', 'Status mesin sewa harus diisi', 'required');
        $validator->addRule('tanggalMasukMesinSewa', 'Tanggal masuk mesin sewa harus diisi', 'required');

        $validator->addEntries($_POST);
        $validator->validate();

        $entries = $validator->getEntries();


        if ($validator->foundErrors()) {

            $errors = $validator->getErrors();
            $entries['idMesinSewa'] = $_GET['id'];
            $entries['tanggalKeluarMesinSewa'] = $_POST['tanggalKeluarMesinSewa'];
            $result->setMessage("Ooopss, terjadi error. Lihat pesan dibawah");
            $result->setIsSuccess(false);

        }else{


            $tglMasuk = $entries['tanggalMasukMesinSewa'];
            $tglKeluar = $entries['tanggalKeluarMesinSewa'];

            $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );

            if($tglKeluar!=null && $tglKeluar!=""){
                $tglKeluar = date("Y-m-d", strtotime($tglKeluar) );
            }else{
                $tglKeluar = NULL;
            }

            $tglMasuk = date("Y-m-d", strtotime($tglMasuk) );

            $mesinSewaModel->setNomorMesinSewa($entries['nomorMesinSewa']);
            $mesinSewaModel->setIdJenisMesin($entries['jenisMesinSewa']);
            $mesinSewaModel->setLokasiMesinSewa($entries['lokasiMesinSewa']);
            $mesinSewaModel->setStatusMesinSewa($entries['statusMesinSewa']);
            $mesinSewaModel->setTanggalMasukMesinSewa($tglMasuk);
            $mesinSewaModel->setTanggalKeluarMesinSewa($tglKeluar);
            $mesinSewaModel->setIdMesinSewa($_GET['id']);

            //print_r($mesinSewaModel);die();

            $result = $mesinSewaController->update($mesinSewaModel);
        }



        break;

    case 'delete':
        if($_GET['status_mesin']==3){

            $result->setIsSuccess(false);
            $result->setMessage("Tidak bisa hapus data, karena status mesin sedang diperbaiki");
        }else{
            $mesinSewaModel->setIdMesinSewa($_GET['id_mesin']);
            $mesinSewaModel->setNomorMesinSewa($_GET['no_mesin']);

            $result = $mesinSewaController->delete($mesinSewaModel);
        }


        break;

}


$_SESSION['message'] = $result->getMessage();
$_SESSION['success'] = $result->getisSuccess();
$_SESSION['errors'] = $errors;
$_SESSION['entries'] = $entries;

if(sizeof($errors)<=0){
    header("Location: tampil_data_mesin_sewa.php");
}else{

    if($aksi=='insert'){
        header("Location: tambah_data_mesin_sewa.php");
    }else if ($aksi=='edit'){
        header("Location: ubah_data_mesin_sewa.php");
    }
}
?>