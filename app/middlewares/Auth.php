<?php

class Auth {
    public function __construct()
    {
        if ( !isset($_SESSION["idu"]) && !isset($_SESSION["idl"]) ) {
            header("Location: " . BASEURL . "/login");
        }   
    }
}