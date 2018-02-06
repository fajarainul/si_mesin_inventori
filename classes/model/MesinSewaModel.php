<?php

class MesinSewaModel{

    var $id_mesin_sewa;
    var $nomor_mesin_sewa;
    var $id_jenis_mesin;
    var $lokasi_mesin_sewa;
    var $status_mesin_sewa;
    var $tanggal_masuk_mesin_sewa;
    var $tanggal_keluar_mesin_sewa;
    var $tanggal_mulai_perbaikan;
    var $tanggal_selesai_perbaikan;

    /**
     * @return mixed
     */
    public function getIdMesinSewa()
    {
        return $this->id_mesin_sewa;
    }

    /**
     * @param mixed $id_mesin_sewa
     */
    public function setIdMesinSewa($id_mesin_sewa)
    {
        $this->id_mesin_sewa = $id_mesin_sewa;
    }

    /**
     * @return mixed
     */
    public function getNomorMesinSewa()
    {
        return $this->nomor_mesin_sewa;
    }

    /**
     * @param mixed $nomor_mesin_sewa
     */
    public function setNomorMesinSewa($nomor_mesin_sewa)
    {
        $this->nomor_mesin_sewa = $nomor_mesin_sewa;
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
    public function getLokasiMesinSewa()
    {
        return $this->lokasi_mesin_sewa;
    }

    /**
     * @param mixed $lokasi_mesin_sewa
     */
    public function setLokasiMesinSewa($lokasi_mesin_sewa)
    {
        $this->lokasi_mesin_sewa = $lokasi_mesin_sewa;
    }

    /**
     * @return mixed
     */
    public function getStatusMesinSewa()
    {
        return $this->status_mesin_sewa;
    }

    /**
     * @param mixed $status_mesin_sewa
     */
    public function setStatusMesinSewa($status_mesin_sewa)
    {
        $this->status_mesin_sewa = $status_mesin_sewa;
    }

    /**
     * @return mixed
     */
    public function getTanggalMasukMesinSewa()
    {
        return $this->tanggal_masuk_mesin_sewa;
    }

    /**
     * @param mixed $tanggal_masuk_mesin_sewa
     */
    public function setTanggalMasukMesinSewa($tanggal_masuk_mesin_sewa)
    {
        $this->tanggal_masuk_mesin_sewa = $tanggal_masuk_mesin_sewa;
    }

    /**
     * @return mixed
     */
    public function getTanggalKeluarMesinSewa()
    {
        return $this->tanggal_keluar_mesin_sewa;
    }

    /**
     * @param mixed $tanggal_keluar_mesin_sewa
     */
    public function setTanggalKeluarMesinSewa($tanggal_keluar_mesin_sewa)
    {
        $this->tanggal_keluar_mesin_sewa = $tanggal_keluar_mesin_sewa;
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