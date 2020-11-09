<?php

class BukuController extends BaseController {
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $data = [
            "page" => "table",
            "books" => $this->model("Buku")->getAllBooks(),
            "auth_user" => $this->model("AuthUser")->user()
        ];
        
        $this->view("buku/index", $data);
    }

    public function create()
    {
        $data = [
            "page" => "",
            "auth_user" => $this->model("AuthUser")->user()
        ];
        
        $this->view("buku/create", $data);
    }

    public function store()
    {
        $result = $this->model("Buku")->createBook($_POST);

        if ( $result ) {
            Validate::redirectWith("Buku berhasil disimpan!", "success", "/buku");
        }
    }

    public function edit($id_buku)
    {
        $data = [
            "page" => "",
            "book" => $this->model("Buku")->getBookById($id_buku),
            "auth_user" => $this->model("AuthUser")->user()
        ];

        $this->view("buku/edit", $data);
    }

    public function update($id_buku)
    {
        $result = $this->model("Buku")->updateBook($id_buku, $_POST);

        if ( $result ) {
            Validate::redirectWith("Buku berhasil diubah!", "success", "/buku");
        }
    }

    public function delete($id_buku)
    {
        $result = $this->model("Buku")->deleteBook($id_buku);

        if ( $result ) {
            Validate::redirectWith("Buku berhasil dihapus!", "success", "/buku");
        }
    }
}