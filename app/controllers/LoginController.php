<?php 
    class LoginController extends BaseController{
        public function index()
        {
            require_once "../app/views/auth/login.php";
        }

        public function authenticate()
        {
            $result = $this->model("AuthUser")->login($_POST);

            if ( $result ) {
                $_SESSION["idu"] = $result["id_user"];
                $_SESSION["idl"] = $result["level"];

                Validate::redirectWith("Selamat datang, {$result['username']}", "success", "/");
            }
        }
    }
 ?>