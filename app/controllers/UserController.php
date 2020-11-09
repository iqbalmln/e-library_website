<?php

class UserController extends BaseController {
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("level");
    }
    
    public function index()
    {
        $data = [
            "page" => "table",
            "users" => $this->model("User")->getAllUsers(),
            "auth_user" => $this->model("AuthUser")->user()
        ];
        
        $this->view("user/index", $data);
    }

    public function create()
    {
        $data = [
            "page" => "",
            "auth_user" => $this->model("AuthUser")->user()
        ];

        $this->view("user/create", $data);
    }

    public function store()
    {
        $result = $this->model("User")->createUser($_POST, $_FILES);

        if ( $result ) {
            Validate::redirectWith("Berhasil membuat user!", "success", "/user");
        }
    }

    public function edit($id_user)
    {
        $data = [
            "page" => "",
            "user" => $this->model("User")->getUserById($id_user),
            "auth_user" => $this->model("AuthUser")->user()
        ];

        $this->view("user/edit", $data);
    }

    public function update($id_user)
    {
        $result = $this->model("User")->updateUser($id_user, $_POST, $_FILES);

        if ( $result ) {
            Validate::redirectWith("Berhasil merubah user!", "success", "/user");
        }
    }

    public function delete($id_user)
    {
        $result = $this->model("User")->deleteUser($id_user);

        if ( $result ) {
            Validate::redirectWith("Berhasil menghapus user!", "success", "/user");
        }
    }
}