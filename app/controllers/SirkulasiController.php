<?php
  
class SirkulasiController extends BaseController {
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $data = [
            "page" => "table",
            "sirkulasi" => $this->model("Sirkulasi")->getAllSirkulasi(),
            "auth_user" => $this->model("AuthUser")->user()
        ];

        $this->view("sirkulasi/index", $data);
    }

    public function create()
    {
        $data = [
            "page" => "",
            "data_buku" => $this->model("Buku")->getAllBooks(),
            "data_anggota" => $this->model("Anggota")->getAllMembers(),
            "auth_user" => $this->model("AuthUser")->user()
        ];
        
        $this->view("sirkulasi/create", $data);
    }

    public function store()
    {
        $result = $this->model("Sirkulasi")->createSirkulasi($_POST);

        if ( $result ) {
            Validate::redirectWith("Berhasil menambahkan data!", "success", "/sirkulasi");
        }
    }

    public function increment($id_skl)
    {
        $old_date = strtotime("3 day", strtotime($this->model("Sirkulasi")->tambahTanggalKembali($id_skl)));
        $new_date = date("Y-m-d", $old_date);

        $result = $this->model("Sirkulasi")->updateTanggalKembali($id_skl, $new_date);

        if ( $result ) {
            Validate::redirectWith("Berhasil diperpanjang!", "success", "/sirkulasi");
        }
    }

    public function delete($id_skl)
    {
        $result = $this->model("Sirkulasi")->deleteSirkulasi($id_skl);

        if ( $result ) {
            Validate::redirectWith("Berhasil dikembalikan!", "success", "/sirkulasi");
        }
    }
}