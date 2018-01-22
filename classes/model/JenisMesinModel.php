<?php

    class JenisMesinModel{
        var $id_jenis_mesin;
        var $nama_jenis_mesin;
        var $kode_jenis_mesin;
        var $date_created;

        /**
         * @return mixed
         */
        public function getIdJenisMesin()
        {
            return $this->id_jenis_mesin;
        }

        /**
         * @param mixed $id_jenis_mesin
         */
        public function setIdJenisMesin($id_jenis_mesin)
        {
            $this->id_jenis_mesin = $id_jenis_mesin;
        }

        /**
         * @return mixed
         */
        public function getNamaJenisMesin()
        {
            return $this->nama_jenis_mesin;
        }

        /**
         * @param mixed $nama_jenis_mesin
         */
        public function setNamaJenisMesin($nama_jenis_mesin)
        {
            $this->nama_jenis_mesin = $nama_jenis_mesin;
        }

        /**
         * @return mixed
         */
        public function getKodeJenisMesin()
        {
            return $this->kode_jenis_mesin;
        }

        /**
         * @param mixed $kode_jenis_mesin
         */
        public function setKodeJenisMesin($kode_jenis_mesin)
        {
            $this->kode_jenis_mesin = $kode_jenis_mesin;
        }

        /**
         * @return mixed
         */
        public function getDateCreated()
        {
            return $this->date_created;
        }

        /**
         * @param mixed $date_created
         */
        public function setDateCreated($date_created)
        {
            $this->date_created = $date_created;
        }


    }

?>