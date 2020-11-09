<?php

class DashboardController extends BaseController {
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $data = [
            "page" => "dashboard",
            "jumlah_buku" => $this->model("Buku")->countBooks()["COUNT(*)"],
            "jumlah_anggota" => $this->model("Anggota")->countMembers()["COUNT(*)"],
            "jumlah_peminjaman" => $this->model("Sirkulasi")->countSirkulasi()["COUNT(*)"],
            "jumlah_pengembalian" => $this->model("Log_Pinjam")->countLog()["COUNT(*)"],
            "riwayat" => $this->model("Log_Pinjam")->getAllRiwayat(),
            "auth_user" => $this->model("AuthUser")->user(),
        ];

        $this->view("dashboard/index", $data);
    }
}