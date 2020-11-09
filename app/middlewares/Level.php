<?php

class Level {
    public function __construct()
    {
        if ( $_SESSION["idl"] != "superadmin" ) {
            header("Location: " . BASEURL . "/");
        }
    }
}