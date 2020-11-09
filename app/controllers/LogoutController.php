<?php

class LogoutController extends BaseController {
    public function index()
    {
        session_destroy();
        header("Location: " . BASEURL . "/login");
    }
}