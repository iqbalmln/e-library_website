<?php

class AuthUser {
    private $table = "user";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($data)
    {
        $email = $data["email"];
        $password = $data["password"];

        if ( empty($email) ) {
            Validate::redirectWith("Email tidak boleh kosong!", "error", "/login");
        } else if ( empty($password) ) {
            Validate::redirectWith("Password tidak boleh kosong!", "error", "/login");
        } else {
            $query = "SELECT id_user, username, level FROM {$this->table} 
                WHERE email=:email AND password=:password";

            $this->db->query($query);
            $this->db->bind("email", $email);
            $this->db->bind("password", md5($password));
            return $this->db->fetch();
        }
    }

    public function user()
    {
        $id_user = $_SESSION["idu"];

        $query = "SELECT username, foto FROM {$this->table} WHERE id_user=:id_user";

        $this->db->query($query);
        $this->db->bind("id_user", $id_user);
        return $this->db->fetch();
    }
}