<?php

class App {
    // properti kelas diakses dengan ->
    // ini adalah default controller - method - dan parameters
    // jika tidak terdapat url, maka gunakan ini
    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];
    
    public function __construct()
    {
        // index ke-0 dijadikan controller
        // index ke-1 dijadikan method
        // index seterusnya dijadikan parameters
        $url = $this->parseURL();

        // 1. Controller Setup
        // Kita set controller dari url nya jika url dengan index ke-0 itu ada
        if ( isset($url[0]) ) {
            // Pertama, kita cek dulu ada apa tidak file controller nya berdasarkan url dengan index ke-0
            if ( file_exists("../app/controllers/" . $url[0] . "Controller.php") ) {
                // $url[0] = "user"
                // gabung dengan Controller
                // userController
                $this->controller = $url[0] . "Controller"; 
            }
            unset($url[0]);
        }

        // Kita panggil dan jangan lupa kita instansiasi kelas dari file yang kita panggil.
        require_once "../app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        // 2. Method Setup
        // Kita set method dari url nya jika url dengan index ke-1 itu ada
        if ( isset($url[1]) ) {
            if ( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
            }
            unset($url[1]);
        }

        // 3. Parameters Setup
        // Sisa dari $url tadi, langsung aja kita masukkin ke $params
        if ( !empty($url) ) {
            $this->params = array_values($url);
        }

        // 4. Jalankan Controller - Method - dan Parameter(Jika ada)
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if ( isset($_GET["url"]) ) {
            // Ambil $_GET lalu simpan ke variable yang namanya $url
            $url = $_GET["url"];

            // Kita bersihkan dulu nilai dari $_GET["url"] supaya tidak ada garis miring di sisi kanan
            // lalu re-assign ke variable yang namanya $url
            $url = rtrim($url, "/");

            // Kita bersihkan supaya url yang diterima tidak inject atau palsu atau jahat atau cacad
            // lalu re-assign ke variable yang namanya $url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Kita pecah url nya jadi array dengan delimitter "/"
            // products/create --> ["products", "create"];
            $url = explode("/", $url);
            return $url;
        }
    }
}