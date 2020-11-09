<?php
  
class AnggotaController extends BaseController {
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $data = [
            "page" => "table",
            "members" => $this->model("Anggota")->getAllMembers(),
            "auth_user" => $this->model("AuthUser")->user()
        ];

        $this->view("anggota/index", $data);
    }

    public function create()
    {
        $data = [
            "page" => "",
            "auth_user" => $this->model("AuthUser")->user()
        ];

        $this->view("anggota/create", $data);
    }

    public function store()
    {
        $result = $this->model("Anggota")->createAnggota($_POST);

        if ( $result ) {
            Validate::redirectWith("Anggota berhasil ditambahkan!", "success", "/anggota");
        }
    }

    public function edit($id_anggota)
    {
        $data = [
            "page" => "",
            "member" => $this->model("Anggota")->getMemberById($id_anggota),
            "auth_user" => $this->model("AuthUser")->user()
        ];

        $this->view("anggota/edit", $data);
    }

    public function update($id_anggota)
    {
       $result = $this->model("Anggota")->updateAnggota($id_anggota, $_POST);
       if($result) {
           Validate::redirectWith("Anggota berhasil update!","success","/anggota");
       }
    }
    public function delete($id_anggota)
    {
        $result = $this->model("Anggota")->deleteAnggota($id_anggota);

        if ( $result ) {
            Validate::redirectWith("Anggota berhasil dihapus!", "success", "/anggota");
        }
    }
}