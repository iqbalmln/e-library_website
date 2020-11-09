<?php

class Anggota {
    protected $table = "anggota";
    protected $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMembers()
    {
        $query = "SELECT * FROM {$this->table}";

        $this->db->query($query);
        return $this->db->fetchAll();
    }

    public function getMemberById($id_anggota)
    {
        $query = "SELECT * FROM {$this->table} WHERE id_anggota=:id_anggota";

        $this->db->query($query);
        $this->db->bind("id_anggota", $id_anggota);
        return $this->db->fetch();
    }

    public function countMembers()
    {
        $query = "SELECT COUNT(*) FROM {$this->table}";

        $this->db->query($query);
        return $this->db->fetch();
    }

    public function createAnggota($data)
    {
        // Sanitize
        $id_anggota = htmlspecialchars($data["id_anggota"]);
        $nama = htmlspecialchars($data["nama"]);
        $jk = htmlspecialchars($data["jk"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        // Validate
        if ( empty($id_anggota) ) {
            Validate::redirectWith("ID Anggota tidak boleh kosong!", "error", "/anggota/create");
        } else if ( empty($nama) ) {
            Validate::redirectWith("Nama tidak boleh kosong!", "error", "/anggota/create");
        } else if ( empty($jk) ) {
            Validate::redirectWith("Jenis Kelamin tidak boleh kosong!", "error", "/anggota/create");
        } else if ( empty($no_hp) ) {
            Validate::redirectWith("Nomor Handphone Terbit tidak boleh kosong!", "error", "/anggota/create");
        } else {            
            // Save
            $query = "INSERT INTO 
                {$this->table} (id_anggota, nama, alamat, jk, no_hp)
                VALUES (:id_anggota, :nama, :alamat, :jk, :no_hp)";
            
            $this->db->query($query);
            $this->db->bind("id_anggota", $id_anggota);
            $this->db->bind("nama", $nama);
            $this->db->bind("jk", $jk);
            $this->db->bind("alamat", $alamat);
            $this->db->bind("no_hp", $no_hp);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }
    public function updateAnggota($id_anggota, $data)
    {
   
        // Sanitize
        $nama = htmlspecialchars($data["nama"]);
        $jk = htmlspecialchars($data["jk"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        // Validate
         if ( empty($nama) ) {
            Validate::redirectWith("Nama Anggota tidak boleh kosong!", "error", "/buku/edit/$id_anggota");
        } else if ( empty($jk) ) {
            Validate::redirectWith("Jenis Kelamin tidak boleh kosong!", "error", "/buku/edit/$id_anggota");
        } else if ( empty($alamat) ) {
            Validate::redirectWith("Alamat tidak boleh kosong!", "error", "/buku/edit/$id_anggota");
        } else if ( empty($no_hp) ) {
            Validate::redirectWith("No. Handphone tidak boleh kosong!", "error", "/buku/edit/$id_anggota");
        } else {            
            // Save
            $query = "UPDATE {$this->table}
                SET 
                nama=:nama,
                jk=:jk,
                alamat=:alamat,
                no_hp=:no_hp
                WHERE id_anggota=:id_anggota";
            
            $this->db->query($query);
            $this->db->bind("nama", $nama);
            $this->db->bind("jk", $jk);
            $this->db->bind("alamat", $alamat);
            $this->db->bind("no_hp", $no_hp);
            $this->db->bind("id_anggota", $id_anggota);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }
    public function deleteAnggota($id_anggota)
    {
        $query = "DELETE FROM {$this->table} WHERE id_anggota=:id_anggota";

        $this->db->query($query);
        $this->db->bind("id_anggota", $id_anggota);
        $this->db->execute();

        return $this->db->rowCount();
    }
}