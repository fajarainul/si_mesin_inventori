<?php

class MesinInventoriModel{

    var $id_mesin_inventori;
    var $nomor_mesin_inventori;
    var $id_jenis_mesin;
    var $lokasi_mesin_inventori;
    var $status_mesin_inventori;
    var $tanggal_masuk_mesin_inventori;
    var $tanggal_mulai_perbaikan;
    var $tanggal_selesai_perbaikan;

    /**
     * @return mixed
     */
    public function getIdMesinInventori()
    {
        return $this->id_mesin_inventori;
    }

    /**
     * @param mixed $id_mesin_inventori
     */
    public function setIdMesinInventori($id_mesin_inventori)
    {
        $this->id_mesin_inventori = $id_mesin_inventori;
    }

    /**
     * @return mixed
     */
    public function getNomorMesinInventori()
    {
        return $this->nomor_mesin_inventori;
    }

    /**
     * @param mixed $nomor_mesin_inventori
     */
    public function setNomorMesinInventori($nomor_mesin_inventori)
    {
        $this->nomor_mesin_inventori = $nomor_mesin_inventori;
    }

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
    public function getLokasiMesinInventori()
    {
        return $this->lokasi_mesin_inventori;
    }

    /**
     * @param mixed $lokasi_mesin_inventori
     */
    public function setLokasiMesinInventori($lokasi_mesin_inventori)
    {
        $this->lokasi_mesin_inventori = $lokasi_mesin_inventori;
    }

    /**
     * @return mixed
     */
    public function getStatusMesinInventori()
    {
        return $this->status_mesin_inventori;
    }

    /**
     * @param mixed $status_mesin_inventori
     */
    public function setStatusMesinInventori($status_mesin_inventori)
    {
        $this->status_mesin_inventori = $status_mesin_inventori;
    }

    /**
     * @return mixed
     */
    public function getTanggalMasukMesinInventori()
    {
        return $this->tanggal_masuk_mesin_inventori;
    }

    /**
     * @param mixed $tanggal_masuk_mesin_inventori
     */
    public function setTanggalMasukMesinInventori($tanggal_masuk_mesin_inventori)
    {
        $this->tanggal_masuk_mesin_inventori = $tanggal_masuk_mesin_inventori;
    }

    /**
     * @return mixed
     */
    public function getTanggalMulaiPerbaikan()
    {
        return $this->tanggal_mulai_perbaikan;
    }

    /**
     * @param mixed $tanggal_mulai_perbaikan
     */
    public function setTanggalMulaiPerbaikan($tanggal_mulai_perbaikan)
    {
        $this->tanggal_mulai_perbaikan = $tanggal_mulai_perbaikan;
    }

    /**
     * @return mixed
     */
    public function getTanggalSelesaiPerbaikan()
    {
        return $this->tanggal_selesai_perbaikan;
    }

    /**
     * @param mixed $tanggal_selesai_perbaikan
     */
    public function setTanggalSelesaiPerbaikan($tanggal_selesai_perbaikan)
    {
        $this->tanggal_selesai_perbaikan = $tanggal_selesai_perbaikan;
    }




}

?>