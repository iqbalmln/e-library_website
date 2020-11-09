<?php

class Sirkulasi {
    private $table = "sirkulasi";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSirkulasi()
    {
        $query = "SELECT s.id_sirkulasi, b.judul_buku, a.nama, s.tanggal_pinjam, s.tanggal_kembali
            FROM sirkulasi s
            JOIN buku b ON b.id_buku = s.id_buku
            JOIN anggota a ON a.id_anggota = s.id_anggota";

        $this->db->query($query);
        return $this->db->fetchAll();
    }

    public function countSirkulasi()
    {
        $query = "SELECT COUNT(*) FROM {$this->table}";

        $this->db->query($query);
        return $this->db->fetch();
    }

    public function createSirkulasi($data)
    {
        $id_sirkulasi = $data["id_sirkulasi"];
        $id_anggota = $data["id_anggota"];
        $id_buku = $data["id_buku"];
        $tanggal_pinjam = $data["tanggal_pinjam"];
        $tanggal_kembali = date("Y-m-d", strtotime("7 day", strtotime($tanggal_pinjam)));
        
        if ( empty($id_sirkulasi) ) {
            Validate::redirectWith("ID Sirkulasi tidak boleh kosong!", "error", "/sirkulasi/create");
        } else if ( empty($id_anggota) ) {
            Validate::redirectWith("ID Anggota tidak boleh kosong!", "error", "/sirkulasi/create");
        } else if ( empty($id_buku) ) {
            Validate::redirectWith("ID Buku tidak boleh kosong!", "error", "/sirkulasi/create");
        } else if ( empty($tanggal_pinjam) ) {
            Validate::redirectWith("Tanggal Pinjam tidak boleh kosong!", "error", "/sirkulasi/create");
        } else if ( empty($tanggal_kembali) ) {
            Validate::redirectWith("Tanggal Kembali tidak boleh kosong!", "error", "/sirkulasi/create");
        } else {
            $query = "INSERT INTO {$this->table}
                VALUES (:id_sirkulasi, :id_buku, :id_anggota, :tanggal_pinjam, :tanggal_kembali)";
            
            $this->db->query($query);
            $this->db->bind("id_sirkulasi", $id_sirkulasi);
            $this->db->bind("id_buku", $id_buku);
            $this->db->bind("id_anggota", $id_anggota);
            $this->db->bind("tanggal_pinjam", $tanggal_pinjam);
            $this->db->bind("tanggal_kembali", $tanggal_kembali);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function tambahTanggalKembali($id_skl)
    {
        $query = "SELECT tanggal_kembali FROM {$this->table} WHERE id_sirkulasi=:id_sirkulasi";

        $this->db->query($query);
        $this->db->bind("id_sirkulasi", $id_skl);

        $result = $this->db->fetch();
        return $result["tanggal_kembali"];
    }

    public function updateTanggalKembali($id_skl, $date)
    {
        $query = "UPDATE {$this->table}
            SET tanggal_kembali=:tanggal_kembali
            WHERE id_sirkulasi=:id_sirkulasi";

        $this->db->query($query);
        $this->db->bind("tanggal_kembali", $date);
        $this->db->bind("id_sirkulasi", $id_skl);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSirkulasi($id_skl)
    {
        $query = "DELETE FROM {$this->table} WHERE id_sirkulasi=:id_sirkulasi";

        $this->db->query($query);
        $this->db->bind("id_sirkulasi", $id_skl);
        $this->db->execute();

        return $this->db->rowCount();
    }
}