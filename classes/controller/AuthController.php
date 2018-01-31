<?php

require_once (__DIR__.'/../Database.php');
require_once (__DIR__.'/../model/UserModel.php');

class AuthController{
    var $connection;
    var $loginSuccess = "Login Success";
    var $userNotFound = "User tidak ditemukan";
    var $logoutSuccess = "Tambah data jenis mesin berhasil";

    var $tbName = "tb_user";

    function __construct(){
        $database = new Database();
        $this->connection = $database->connection;
    }


    public function login(UserModel $userModel)
    {
        $result = new Result();

        $password = md5($userModel->getPassword());

        $checkUser = $this->connection->query('SELECT * FROM '.$this->tbName.' WHERE username="'.$userModel->getUsername().'" AND password = "'.$password.'"');

        if($checkUser->num_rows<=0){
            $result->setIsSuccess(false);
            $result->setMessage($this->userNotFound);

            header("Location: ../../login.php");

        }else{
            session_start();
            $user = $checkUser->fetch_object(UserModel::class);

            $_SESSION['username'] = $user->getUsername();
            $_SESSION['level'] = $user->getLevel();
            $_SESSION['id_user'] = $user->getIdUser();

            $result->setIsSuccess(true);
            $result->setMessage($this->loginSuccess);

        }


        return $result;

    }

}

?>