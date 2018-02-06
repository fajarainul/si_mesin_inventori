<?php

require_once (__DIR__.'/../Database.php');
require_once (__DIR__.'/../model/MesinSewaModel.php');

class MesinSewaController{
    var $connection;
    var $successInsert = "Tambah mesin sewa berhasil";
    var $successUpdate = "Ubah mesin sewa berhasil";
    var $successDelete = "Hapus mesin sewa berhasil";
    var $failedDelete = "Hapus mesin inventori gagal";
    var $errorNotUnique = "Nomor mesin sewa harus unik";
    var $failedChangeStatus = "Ubah status mesin gagal";

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

            if($mesinSewaModel->getTanggalKeluarMesinSewa()!=null){
                $insert = $this->connection->query('INSERT into '.$this->tbMesinSewa.'(nomor_mesin_sewa, id_jenis_mesin, lokasi_mesin_sewa, status_mesin_sewa, tanggal_masuk_mesin_sewa, tanggal_keluar_mesin_sewa) 
                        VALUES("'.$mesinSewaModel->getNomorMesinSewa().'", "'.$mesinSewaModel->getIdJenisMesin().'","'.$mesinSewaModel->getLokasiMesinSewa().'", "'.$mesinSewaModel->getStatusMesinSewa().'", "'.$mesinSewaModel->getTanggalMasukMesinSewa().'" , "'.$mesinSewaModel->getTanggalKeluarMesinSewa().'")');
            }else{
                $insert = $this->connection->query('INSERT into '.$this->tbMesinSewa.'(nomor_mesin_sewa, id_jenis_mesin, lokasi_mesin_sewa, status_mesin_sewa, tanggal_masuk_mesin_sewa) 
                        VALUES("'.$mesinSewaModel->getNomorMesinSewa().'", "'.$mesinSewaModel->getIdJenisMesin().'","'.$mesinSewaModel->getLokasiMesinSewa().'", "'.$mesinSewaModel->getStatusMesinSewa().'", "'.$mesinSewaModel->getTanggalMasukMesinSewa().'" )');

            }

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
                                                    ON tb_mesin_sewa.id_jenis_mesin = tb_jenis_mesin.id_jenis_mesin ORDER BY tb_mesin_sewa.id_mesin_sewa');

        if(!$listData){
            die("Query gagal : ".$this->connection->error);
        }else{

            return $listData;

        }
    }

    public function retrieveTeknisi()
    {
        $listData = $this->connection->query('SELECT * FROM '.$this->tbMesinSewa.' 
                                                    INNER JOIN '.$this->tbJenisMesin.' 
                                                    ON tb_mesin_sewa.id_jenis_mesin = tb_jenis_mesin.id_jenis_mesin WHERE tb_mesin_sewa.status_mesin_sewa != 1 ORDER BY tb_mesin_sewa.id_mesin_sewa');

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

            if($mesinSewaModel->getTanggalKeluarMesinSewa()!=null){
                $update = $this->connection->query('UPDATE '.$this->tbMesinSewa.' SET nomor_mesin_sewa="'.$mesinSewaModel->getNomorMesinSewa().'", id_jenis_mesin="'.$mesinSewaModel->getIdJenisMesin().'", lokasi_mesin_sewa ="'.$mesinSewaModel->getLokasiMesinSewa().'", status_mesin_sewa ="'.$mesinSewaModel->getStatusMesinSewa().'", tanggal_masuk_mesin_sewa="'.$mesinSewaModel->getTanggalMasukMesinSewa().'", tanggal_keluar_mesin_sewa="'.$mesinSewaModel->getTanggalKeluarMesinSewa().'" WHERE id_mesin_sewa = '.$mesinSewaModel->getIdMesinSewa());
            }else{
                $update = $this->connection->query('UPDATE '.$this->tbMesinSewa.' SET nomor_mesin_sewa="'.$mesinSewaModel->getNomorMesinSewa().'", id_jenis_mesin="'.$mesinSewaModel->getIdJenisMesin().'", lokasi_mesin_sewa ="'.$mesinSewaModel->getLokasiMesinSewa().'", status_mesin_sewa ="'.$mesinSewaModel->getStatusMesinSewa().'", tanggal_masuk_mesin_sewa="'.$mesinSewaModel->getTanggalMasukMesinSewa().'" WHERE id_mesin_sewa = '.$mesinSewaModel->getIdMesinSewa());
            }


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

    public function updateTeknisi(MesinSewaModel $mesinSewaModel)
    {
        $result = new Result();

        $checkIfExist = $this->connection->query('SELECT * from '.$this->tbMesinSewa.' WHERE id_mesin_sewa = '.$mesinSewaModel->getIdMesinSewa().'');

        if($checkIfExist->num_rows>0){
            //jika status sedang perbaikan (status = 3)
            if($mesinSewaModel->getStatusMesinSewa()==3){
                $update = $this->connection->query('UPDATE '.$this->tbMesinSewa.' SET  status_mesin_sewa ="'.$mesinSewaModel->getStatusMesinSewa().'", tanggal_mulai_perbaikan ="'.$mesinSewaModel->getTanggalMulaiPerbaikan().'", tanggal_selesai_perbaikan = NULL WHERE id_mesin_sewa = '.$mesinSewaModel->getIdMesinSewa());
            }
            //jika status selesai perbaikan (status =4 )  atau rusak (status = 5)
            else if($mesinSewaModel->getStatusMesinSewa()==4 || $mesinSewaModel->getStatusMesinSewa()==5) {
                $update = $this->connection->query('UPDATE '.$this->tbMesinSewa.' SET  status_mesin_sewa ="'.$mesinSewaModel->getStatusMesinSewa().'", tanggal_selesai_perbaikan ="'.$mesinSewaModel->getTanggalSelesaiPerbaikan().'" WHERE id_mesin_sewa = '.$mesinSewaModel->getIdMesinSewa());
            }

            if(!$update){
                die("Query gagal : ".$this->connection->error);
            }else{

                $result->setIsSuccess(true);
                $result->setMessage($this->successUpdate);
            }
        }else{

            $result->setIsSuccess(false);
            $result->setMessage($this->failedChangeStatus);
        }


        return $result;

    }

    public function delete(MesinSewaModel $mesinSewaModel)
    {
        $result = new Result();

        if($this->checkIfDataExist($mesinSewaModel)){

            $delete = $this->connection->query('DELETE FROM '.$this->tbMesinSewa.' WHERE id_mesin_sewa="'.$mesinSewaModel->getIdMesinSewa().'" AND nomor_mesin_sewa="'.$mesinSewaModel->getNomorMesinSewa().'" ');

            if(!$delete){
                die("Query gagal : ".$this->connection->error);
            }else{

                $result->setIsSuccess(true);
                $result->setMessage($this->successDelete);
            }
        }else{
            $result->setIsSuccess(false);
            $result->setMessage($this->failedDelete);
        }

        return $result;
    }

    public function checkIfDataExist(MesinSewaModel $mesinSewaModel){
        if($mesinSewaModel->getIdMesinSewa()==null){
            //berarti insert
            $checkExist = $this->connection->query('SELECT * from '.$this->tbMesinSewa.' WHERE nomor_mesin_sewa = "'.$mesinSewaModel->getNomorMesinSewa().'" ');
        }else if($mesinSewaModel->getLokasiMesinSewa()==null){
            //berarti delete
            $checkExist = $this->connection->query('SELECT * from '.$this->tbMesinSewa.' WHERE nomor_mesin_sewa = "'.$mesinSewaModel->getNomorMesinSewa().'" AND id_mesin_sewa = '.$mesinSewaModel->getIdMesinSewa().'');
        }else{
            //berarti update
            $checkExist = $this->connection->query('SELECT * from '.$this->tbMesinSewa.' WHERE nomor_mesin_sewa = "'.$mesinSewaModel->getNomorMesinSewa().'" AND id_mesin_sewa != '.$mesinSewaModel->getIdMesinSewa().'');
        }
        if($checkExist->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

}

?>