<?php

    class JenisMesin extends Controller {

        var $namaMesin;
        var $kodeMesin;
        var $connection;

        var $successInsert = "Tambah data jenis mesin berhasil";
        var $errorNotUnique = "Nama jenis mesin/kode mesin sudah tersimpan di database";

        public function JenisMesin($connection){

            $this->connection = $connection;

        }

        /*public function create($namaMesin, $kodeMesin)
        {
            // TODO: Implement create() method.
            $res = $this->connection->query("INSERT into tb_jenis_mesin(nama_jenis_mesin,kode_jenis_mesin) VALUES('$namaMesin','$kodeMesin')");

            if(!$res){
                die("Query gagal : ".$this->connection->error);
            }else{
                return $this->successInsert;
            }
        }*/


        public function create()
        {
            // TODO: Implement create() method.
        }

        public function retrieve()
        {
            // TODO: Implement retrieve() method.
        }

        public function update()
        {
            // TODO: Implement update() method.
        }

        public function delete()
        {
            // TODO: Implement delete() method.
        }
    }

?>