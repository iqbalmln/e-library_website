<?php

class User {
    private $table = "user";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUsers()
    {
        $query = "SELECT id_user, username, email, level, foto FROM {$this->table}";
        
        $this->db->query($query);
        return $this->db->fetchAll();
    }

    public function getUserById($id_user)
    {
        $query = "SELECT * FROM {$this->table} WHERE id_user=:id_user";

        $this->db->query($query);
        $this->db->bind("id_user", $id_user);
        return $this->db->fetch();
    }

    public function createUser($data, $file)
    {
        $username = $data["username"];
        $email = $data["email"];
        $password = $data["password"];
        $level = $data["level"];
        
        if ( $file["foto"]["name"] ) {
            // terdapat foto yang diupload
            $foto_name = $file["foto"]["name"];
            $foto_tmp_name = $file["foto"]["tmp_name"];
            $foto_size = $file["foto"]["size"];

            // validasi ukuran foto
            if ( $foto_size > 2000000 ) {
                Validate::redirectWith("Ukuran gambar terlalu besar!", "error", "/user/create");
            }

            $extensions = ["jpg", "png", "jpeg"];
            $foto_extension = strtolower(explode(".", $foto_name)[count(explode(".", $foto_name)) - 1]);

            // validasi ekstensi foto
            if ( !in_array($foto_extension, $extensions) ) {
                Validate::redirectWith("Ekstensi gambar tidak sesuai!", "error", "/user/create");
            }

            // sukses validasi
            $foto = time() . "." . $foto_extension;
            
            move_uploaded_file($foto_tmp_name, "img/uploaded/$foto");
        } else {
            $foto = "avatar.png";
        }

        $query = "INSERT INTO user (username, email, password, level, foto) 
            VALUES(:username, :email, :password, :level, :foto)";

        $this->db->query($query);
        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        $this->db->bind("password", MD5($password));
        $this->db->bind("level", $level);
        $this->db->bind("foto", $foto);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUserFoto($id_user)
    {
        $query = "SELECT foto FROM {$this->table} WHERE id_user=:id_user";

        $this->db->query($query);
        $this->db->bind("id_user", $id_user);
        return $this->db->fetch();
    }

    public function getUserPassword($id_user)
    {
        $query = "SELECT password FROM {$this->table} WHERE id_user=:id_user";

        $this->db->query($query);
        $this->db->bind("id_user", $id_user);
        return $this->db->fetch();
    }

    public function updateUser($id_user, $data, $file)
    {
        $username = $data["username"];
        $email = $data["email"];
        $password = $data["password"];
        $level = $data["level"];

        // cek jika user mengupdate foto
        if ( $file["foto"]["name"] ) {
            // berarti user mengganti foto
            $foto_name = $file["foto"]["name"];
            $foto_tmp_name = $file["foto"]["tmp_name"];
            $foto_size = $file["foto"]["size"];

            // validasi ukuran foto
            if ( $foto_size > 2000000 ) {
                Validate::redirectWith("Ukuran gambar melebihi batas!", "error", "/user/edit");
            }

            $extensions = ["jpg", "jpeg", "png"];
            $foto_extension = strtolower(explode(".", $foto_name)[count(explode(".", $foto_name)) - 1]);

            // validasi ekstensi foto
            if ( !in_array($foto_extension, $extensions) ) {
                Validate::redirectWith("Ekstensi gambar tidak sesuai!", "error", "/user/edit");
            }

            // sukses validasi
            $foto = time() . "." . $foto_extension;

            // hapus foto lama, kemudian insert foto baru
            $oldphoto = $this->getUserFoto($id_user)["foto"];

            if ( file_exists("img/uploaded/$oldphoto") ) {
                unlink("img/uploaded/$oldphoto");
            }

            move_uploaded_file($foto_tmp_name, "img/uploaded/$foto");
        } else {
            // berarti user tidak mengganti foto
            $foto = $this->getUserFoto($id_user)["foto"];
        }

        if ( empty($username) ) {
            Validate::redirectWith("Username tidak boleh kosong!", "error", "/user/edit");
        } else if ( empty($email) ) {
            Validate::redirectWith("Email tidak boleh kosong!", "error", "/user/edit");
        } else {
            // cek jika password tidak diganti (dikosongkan)
            if ( empty($password) ) {
                $password = $this->getUserPassword($id_user)["password"];
            }

            $query = "UPDATE {$this->table}
                SET username=:username,
                email=:email,
                password=:password,
                level=:level,
                foto=:foto
                WHERE id_user=:id_user";

            $this->db->query($query);
            $this->db->bind("username", $username);
            $this->db->bind("email", $email);
            $this->db->bind("password", $password);
            $this->db->bind("level", $level);
            $this->db->bind("foto", $foto);
            $this->db->bind("id_user", $id_user);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function deleteUser($id_user)
    {
        $query = "DELETE FROM {$this->table} WHERE id_user=:id_user";

        $this->db->query($query);
        $this->db->bind("id_user", $id_user);
        $this->db->execute();

        return $this->db->rowCount();
    }
}