<?php

require_once (__DIR__.'/../Database.php');
require_once (__DIR__.'/../model/MesinSewaModel.php');

class MesinSewaController{
    var $connection;
    var $successInsert = "Tambah mesin sewa berhasil";
    var $successUpdate = "Ubah mesin sewa berhasil";
    var $successDelete = "Hapus mesin sewa berhasil";
    var $errorNotUnique = "Nomor mesin sewa harus unik";

    var $tbMesinSewa = "tb_mesin_sewa";
    var $tbJenisMesin = "tb_jenis_mesin";

    function __construct(){
        $database = new Database();
        $this->connection = $database->connection;
    }


    public function create(MesinSewaModel $mesinSewaModel)
    {
        $result = new Result();

        if(!$this->checkIfDataExist($mesinSewaModel)){
            $insert = $this->connection->query('INSERT into '.$this->tbMesinSewa.'(nomor_mesin_sewa, id_jenis_mesin, lokasi_mesin_sewa, status_mesin_sewa, tanggal_masuk_mesin_sewa, tanggal_keluar_mesin_sewa) 
                        VALUES("'.$mesinSewaModel->getNomorMesinSewa().'", "'.$mesinSewaModel->getIdJenisMesin().'","'.$mesinSewaModel->getLokasiMesinSewa().'", "'.$mesinSewaModel->getStatusMesinSewa().'", "'.$mesinSewaModel->getTanggalMasukMesinSewa().'" , "'.$mesinSewaModel->getTanggalKeluarMesinSewa().'")');

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
        $listData = $this->connection->query('SELECT * FROM '.$this->tbMesinSewa.' 
                                                    INNER JOIN '.$this->tbJenisMesin.' 
                                                    ON tb_mesin_inventori.id_jenis_mesin = tb_jenis_mesin.id_jenis_mesin');

        if(!$listData){
            die("Query gagal : ".$this->connection->error);
        }else{

            return $listData;

        }
    }

    public function update(MesinSewaModel $mesinSewaModel)
    {
        $result = new Result();

        if(!$this->checkIfDataExist($mesinSewaModel)){

            $update = $this->connection->query('UPDATE '.$this->tbMesinSewa.' SET nomor_mesin_inventori="'.$mesinSewaModel->getNomorMesinInventori().'", id_jenis_mesin="'.$mesinSewaModel->getIdJenisMesin().'", lokasi_mesin_inventori ="'.$mesinSewaModel->getLokasiMesinInventori().'", status_mesin_inventori ="'.$mesinSewaModel->getStatusMesinInventori().'", tanggal_masuk_mesin_inventori="'.$mesinSewaModel->getTanggalMasukMesinInventori().'" WHERE id_mesin_inventori = '.$mesinSewaModel->getIdMesinInventori());

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

    public function delete(MesinSewaModel $mesinSewaModel)
    {
        $result = new Result();

        if($this->checkIfDataExist($mesinSewaModel)){

            $delete = $this->connection->query('DELETE FROM '.$this->tbMesinSewa.' WHERE id_mesin_inventori="'.$mesinSewaModel->getIdMesinInventori().'" AND nomor_mesin_inventori="'.$mesinSewaModel->getNomorMesinInventori().'" ');

            if(!$delete){
                die("Query gagal : ".$this->connection->error);
            }else{

                $result->setIsSuccess(true);
                $result->setMessage($this->successDelete);
            }
        }else{
            $result->setIsSuccess(false);
            $result->setMessage($this->errorNotUnique);
        }

        return $result;
    }

    public function checkIfDataExist(MesinSewaModel $mesinSewaModel){
        if($mesinSewaModel->getIdMesinSewa()==null){
            //berarti insert
            $checkExist = $this->connection->query('SELECT * from '.$this->tbMesinSewa.' WHERE nomor_mesin_sewa = "'.$mesinSewaModel->getNomorMesinSewa().'" ');
        }else if($mesinSewaModel->getLokasiMesinInventori()==null){
            //berarti delete
            $checkExist = $this->connection->query('SELECT * from '.$this->tbMesinSewa.' WHERE nomor_mesin_inventori = "'.$mesinSewaModel->getNomorMesinInventori().'" AND id_mesin_inventori = '.$mesinSewaModel->getIdMesinInventori().'');
        }else{
            //berarti update
            $checkExist = $this->connection->query('SELECT * from '.$this->tbMesinSewa.' WHERE nomor_mesin_inventori = "'.$mesinSewaModel->getNomorMesinInventori().'" AND id_mesin_inventori != '.$mesinSewaModel->getIdMesinInventori().'');
        }
        if($checkExist->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

}

?>