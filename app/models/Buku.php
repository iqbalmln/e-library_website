<?php

class Buku {
    protected $table = "buku";
    protected $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBooks()
    {
        $query = "SELECT * FROM {$this->table}";

        $this->db->query($query);
        return $this->db->fetchAll();
    }

    public function getBookById($id_buku)
    {
        $query = "SELECT * FROM {$this->table} WHERE id_buku=:id_buku";

        $this->db->query($query);
        $this->db->bind("id_buku", $id_buku);
        return $this->db->fetch();
    }

    public function countBooks()
    {
        $query = "SELECT COUNT(*) FROM {$this->table}";

        $this->db->query($query);
        return $this->db->fetch();
    }

    public function createBook($data)
    {
        // Sanitize
        $id_buku = htmlspecialchars($data["id_buku"]);
        $judul_buku = htmlspecialchars($data["judul_buku"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $pengarang = htmlspecialchars($data["pengarang"]);
        $th_terbit = htmlspecialchars($data["th_terbit"]);

        // Validate
        if ( empty($id_buku) ) {
            Validate::redirectWith("ID Buku tidak boleh kosong!", "error", "/buku/create");
        } else if ( empty($judul_buku) ) {
            Validate::redirectWith("Judul Buku tidak boleh kosong!", "error", "/buku/create");
        } else if ( empty($penerbit) ) {
            Validate::redirectWith("Penerbit tidak boleh kosong!", "error", "/buku/create");
        } else if ( empty($pengarang) ) {
            Validate::redirectWith("Pengarang tidak boleh kosong!", "error", "/buku/create");
        } else if ( empty($th_terbit) ) {
            Validate::redirectWith("Tahun Terbit tidak boleh kosong!", "error", "/buku/create");
        } else {            
            // Save
            $query = "INSERT INTO 
                {$this->table} (id_buku, judul_buku, pengarang, penerbit, th_terbit)
                VALUES (:id_buku, :judul_buku, :pengarang, :penerbit, :th_terbit)";
            
            $this->db->query($query);
            $this->db->bind("id_buku", $id_buku);
            $this->db->bind("judul_buku", $judul_buku);
            $this->db->bind("pengarang", $pengarang);
            $this->db->bind("penerbit", $penerbit);
            $this->db->bind("th_terbit", $th_terbit);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function updateBook($id_buku, $data)
    {
        // Sanitize
        $judul_buku = htmlspecialchars($data["judul_buku"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $pengarang = htmlspecialchars($data["pengarang"]);
        $th_terbit = htmlspecialchars($data["th_terbit"]);

        // Validate
         if ( empty($judul_buku) ) {
            Validate::redirectWith("Judul Buku tidak boleh kosong!", "error", "/buku/edit/$id_buku");
        } else if ( empty($penerbit) ) {
            Validate::redirectWith("Penerbit tidak boleh kosong!", "error", "/buku/edit/$id_buku");
        } else if ( empty($pengarang) ) {
            Validate::redirectWith("Pengarang tidak boleh kosong!", "error", "/buku/edit/$id_buku");
        } else if ( empty($th_terbit) ) {
            Validate::redirectWith("Tahun Terbit tidak boleh kosong!", "error", "/buku/edit/$id_buku");
        } else {            
            // Save
            $query = "UPDATE {$this->table}
                SET 
                judul_buku=:judul_buku,
                pengarang=:pengarang,
                penerbit=:penerbit,
                th_terbit=:th_terbit
                WHERE id_buku=:id_buku";
            
            $this->db->query($query);
            $this->db->bind("judul_buku", $judul_buku);
            $this->db->bind("pengarang", $pengarang);
            $this->db->bind("penerbit", $penerbit);
            $this->db->bind("th_terbit", $th_terbit);
            $this->db->bind("id_buku", $id_buku);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function deleteBook($id_buku)
    {
        $query = "DELETE FROM {$this->table} WHERE id_buku=:id_buku";
        $this->db->query($query);
        $this->db->bind("id_buku", $id_buku);
        $this->db->execute();

        return $this->db->rowCount();
    }
}