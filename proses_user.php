<?php

session_start();

require_once 'classes/controller/AuthController.php';
require_once 'classes/model/UserModel.php';
require_once 'classes/Result.php';

$aksi = $_GET['aksi'];

$authController = new AuthController();
$userModel = new UserModel();
$result = new Result();


switch ($aksi){
    case 'login':

        $userModel->setUsername($_POST['username']);
        $userModel->setPassword($_POST['password']);

        $result = $authController->login($userModel);

        if($result->getisSuccess()){

            if($_SESSION['level'] == "admin"){

                header("Location: admin/index.php");

            }else if($_SESSION['level'] == "teknisi"){

                header("Location: teknisi/index.php");

            }
        }else{

            $_SESSION['message'] = $result->getMessage();
            $_SESSION['success'] = $result->getisSuccess();

            header("Location: index.php");
        }

        break;


    case 'logout' :
        session_unset();

        $_SESSION['message'] = "Logout Berhasil!";
        $_SESSION['success'] = true;

        header("Location: index.php");

        break;


}




?>