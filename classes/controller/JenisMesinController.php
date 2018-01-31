<?php

require_once (__DIR__.'/../Database.php');
require_once (__DIR__.'/../model/JenisMesinModel.php');

class JenisMesinController{
    var $connection;
    var $successInsert = "Tambah data jenis mesin berhasil";
    var $successUpdate = "Ubah data jenis mesin berhasil";
    var $errorNotUnique = "Nama jenis mesin/kode mesin sudah tersimpan di database";

    var $tbName = "tb_jenis_mesin";

    function __construct(){
        $database = new Database();
        $this->connection = $database->connection;
    }


    public function create(JenisMesinModel $jenisMesinModel)
    {
        $result = new Result();

        if(!$this->checkIfDataExist($jenisMesinModel)){
            $insert = $this->connection->query('INSERT into '.$this->tbName.'(nama_jenis_mesin,kode_jenis_mesin) VALUES("'.$jenisMesinModel->getNamaJenisMesin().'", "'.$jenisMesinModel->getKodeJenisMesin().'")');

            if(!$insert){
                die("Query gagal : ".$this->connection->error);
            }else{

                $result->setIsSuccess(true);
                $result->setMessage($this->successInsert);
            }
        }else{
            $result->setIsSuccess(false);
            $result->setMessage($this->errorNotUnique);
        }

        return $result;

    }

    public function retrieve()
    {
        $listData = $this->connection->query('SELECT * FROM '.$this->tbName.'');
        return $listData;
    }

    public function update(JenisMesinModel $jenisMesinModel)
    {
        $result = new Result();

        if(!$this->checkIfDataExist($jenisMesinModel)){

            $update = $this->connection->query('UPDATE '.$this->tbName.' SET kode_jenis_mesin="'.$jenisMesinModel->getKodeJenisMesin().'", nama_jenis_mesin="'.$jenisMesinModel->getNamaJenisMesin().'" WHERE id_jenis_mesin='.$jenisMesinModel->getIdJenisMesin().'');

            if(!$update){
                die("Query gagal : ".$this->connection->error);
            }else{

                $result->setIsSuccess(true);
                $result->setMessage($this->successUpdate);
            }
        }else{
            $result->setIsSuccess(false);
            $result->setMessage($this->errorNotUnique);
        }

        return $result;

    }

    public function delete(JenisMesinModel $jenisMesinModel)
    {

    }

    public function checkIfDataExist(JenisMesinModel $jenisMesinModel){
        if($jenisMesinModel->getIdJenisMesin()==null){
            $checkExist = $this->connection->query('SELECT * from '.$this->tbName.' WHERE nama_jenis_mesin = "'.$jenisMesinModel->getNamaJenisMesin().'" OR kode_jenis_mesin="'.$jenisMesinModel->getKodeJenisMesin().'"');
        }else{
            $checkExist = $this->connection->query('SELECT * from '.$this->tbName.' WHERE (nama_jenis_mesin = "'.$jenisMesinModel->getNamaJenisMesin().'" OR kode_jenis_mesin="'.$jenisMesinModel->getKodeJenisMesin().'") AND id_jenis_mesin!= '.$jenisMesinModel->getIdJenisMesin().'');
        }
        if($checkExist->num_rows>0){
            return true;
        }else{
            return false;
        }
    }
}

?>