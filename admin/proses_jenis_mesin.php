<?php

session_start();

require_once '../classes/controller/JenisMesinController.php';
require_once '../classes/model/JenisMesinModel.php';
require_once '../classes/Result.php';
require_once '../classes/validation/FormValidator.php';
require_once '../classes/validation/ValidationRule.php';

$aksi = $_GET['aksi'];

$jenisMesinController = new JenisMesinController();
$jenisMesinModel = new JenisMesinModel();
$result = new Result();
$validator = new FormValidator();

$errors = array();

switch ($aksi) {
    case 'insert':

        $validator->addRule('namaMesin', 'Nama jenis mesin harus diisi', 'required');
        $validator->addRule('kodeMesin', 'Kode mesin harus diisi', 'required');

        $validator->addEntries($_POST);
        $validator->validate();

        $entries = $validator->getEntries();

        if ($validator->foundErrors()) {

            $errors = $validator->getErrors();
            $result->setMessage("Ooopss, terjadi error. Lihat pesan dibawah");
            $result->setIsSuccess(false);

        }else{

            $jenisMesinModel->setNamaJenisMesin($entries['namaMesin']);
            $jenisMesinModel->setKodeJenisMesin($entries['kodeMesin']);

            $result = $jenisMesinController->create($jenisMesinModel);
        }

        break;

    case 'edit':


        $validator->addRule('namaMesin', 'Nama jenis mesin harus diisi', 'required');
        $validator->addRule('kodeMesin', 'Kode mesin harus diisi', 'required');

        $validator->addEntries($_POST);
        $validator->validate();

        foreach ($entries as $key => $value) {
            ${$key} = $value;
        }

        $entries = $validator->getEntries();

        if ($validator->foundErrors()) {

            $errors = $validator->getErrors();
            $entries['idJenisMesin'] = $_GET['id'];
            $result->setMessage("Ooopss, terjadi error. Lihat pesan dibawah");
            $result->setIsSuccess(false);

        }else {

            $jenisMesinModel->setNamaJenisMesin($_POST['namaMesin']);
            $jenisMesinModel->setKodeJenisMesin($_POST['kodeMesin']);
            $jenisMesinModel->setIdJenisMesin($_GET['id']);

            $result = $jenisMesinController->update($jenisMesinModel);
        }

        break;

    case 'delete':
        $jenisMesinModel->setIdJenisMesin($_GET['id']);

        $result = $jenisMesinController->delete($jenisMesinModel);

        break;

}

$_SESSION['message'] = $result->getMessage();
$_SESSION['success'] = $result->getisSuccess();
$_SESSION['errors'] = $errors;
$_SESSION['entries'] = $entries;

if(sizeof($errors)<=0){
    header("Location: tampil_data_jenis_mesin.php");
}else{

    if($aksi=='insert'){
        header("Location: tambah_data_jenis_mesin.php");
    }else if ($aksi=='edit'){
        header("Location: ubah_data_jenis_mesin.php");
    }
}

?>