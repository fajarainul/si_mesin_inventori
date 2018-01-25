<?php

require_once (__DIR__.'/../Database.php');
require_once (__DIR__.'/../model/MesinInventoriModel.php');

class MesinInventoriController{
    var $connection;
    var $successInsert = "Tambah mesin inventori berhasil";
    var $successUpdate = "Ubah mesin inventori berhasil";
    var $errorNotUnique = "Nomor mesin inventori harus unik";

    var $tbMesinInventori = "tb_mesin_inventori";
    var $tbJenisMesin = "tb_jenis_mesin";

    function __construct(){
        $database = new Database();
        $this->connection = $database->connection;
    }


    public function create(MesinInventoriModel $mesinInventoriModel)
    {
        $result = new Result();

        if($this->checkIfDataExist($mesinInventoriModel)){
            $insert = $this->connection->query('INSERT into '.$this->tbMesinInventori.'(nomor_mesin_inventori, id_jenis_mesin, lokasi_mesin_inventori, status_mesin_inventori, tanggal_masuk_mesin_inventori) 
                        VALUES("'.$mesinInventoriModel->getNomorMesinInventori().'", "'.$mesinInventoriModel->getIdJenisMesin().'","'.$mesinInventoriModel->getLokasiMesinInventori().'", "'.$mesinInventoriModel->getStatusMesinInventori().'", "'.$mesinInventoriModel->getTanggalMasukMesinInventori().'")');

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
        $listData = $this->connection->query('SELECT * FROM '.$this->tbMesinInventori.' 
                                                    INNER JOIN '.$this->tbJenisMesin.' 
                                                    ON tb_mesin_inventori.id_jenis_mesin = tb_jenis_mesin.id_jenis_mesin');

        if(!$listData){
            die("Query gagal : ".$this->connection->error);
        }else{

            return $listData;

        }
    }

    public function update(MesinInventoriModel $mesinInventoriModel)
    {
        $result = new Result();

        if($this->checkIfDataExist($mesinInventoriModel)){

            $update = $this->connection->query('UPDATE '.$this->tbMesinInventori.' SET kode_jenis_mesin="'.$mesinInventoriModel->getKodeJenisMesin().'", nama_jenis_mesin="'.$mesinInventoriModel->getNamaJenisMesin().'" WHERE id_jenis_mesin='.$mesinInventoriModel->getIdJenisMesin().'');

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

    public function delete(MesinInventoriModel $mesinInventoriModel)
    {

    }

    public function checkIfDataExist(MesinInventoriModel $mesinInventoriModel){
        if($mesinInventoriModel->getIdMesinInventori()==null){
            $checkExist = $this->connection->query('SELECT * from '.$this->tbMesinInventori.' WHERE nomor_mesin_inventori = "'.$mesinInventoriModel->getNomorMesinInventori().'" ');
        }else{
            $checkExist = $this->connection->query('SELECT * from '.$this->tbMesinInventori.' WHERE nomor_mesin_inventori = "'.$mesinInventoriModel->getNomorMesinInventori().'" AND id_mesin_inventori != '.$mesinInventoriModel->getIdMesinInventori().'');
        }
        if($checkExist->num_rows<=0){
            return true;
        }else{
            return false;
        }
    }
}

?>