<?php

    session_start();

    require_once '../classes/controller/JenisMesinController.php';
    require_once '../classes/model/JenisMesinModel.php';
    require_once '../classes/Result.php';

    $aksi = $_GET['aksi'];

    $jenisMesinController = new JenisMesinController();
    $jenisMesinModel = new JenisMesinModel();

    switch ($aksi){
        case 'insert':

            $jenisMesinModel->setNamaJenisMesin($_POST['namaMesin']);
            $jenisMesinModel->setKodeJenisMesin($_POST['kodeMesin']);

            $result = new Result();
            $result = $jenisMesinController->create($jenisMesinModel);

            break;

        case 'edit':

            $jenisMesinModel->setNamaJenisMesin($_POST['namaMesin']);
            $jenisMesinModel->setKodeJenisMesin($_POST['kodeMesin']);
            $jenisMesinModel->setIdJenisMesin($_GET['id']);

            $result = new Result();
            $result = $jenisMesinController->update($jenisMesinModel);

            break;

    }


    $_SESSION['message'] = $result->getMessage();
    $_SESSION['success'] = $result->getisSuccess();

    header("Location: tampil_data_jenis_mesin.php");

?>