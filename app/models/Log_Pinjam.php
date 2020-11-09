<?php

class Log_Pinjam {
    private $table = "log_pinjam";
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function countLog()
    {
        $query = "SELECT COUNT(*) FROM {$this->table}";

        $this->db->query($query);
        return $this->db->fetch();
    }

    public function getAllRiwayat()
    {
        $query = "SELECT b.judul_buku, a.nama, lp.tanggal_pinjam, lp.tanggal_kembali, lp.tanggal_dikembalikan
            FROM {$this->table} lp
            JOIN buku b ON b.id_buku = lp.id_buku
            JOIN anggota a ON a.id_anggota = lp.id_anggota";

        $this->db->query($query);
        return $this->db->fetchAll();
    }
}