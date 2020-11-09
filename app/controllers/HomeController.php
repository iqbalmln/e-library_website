<?php
  
class HomeController extends BaseController {
    public function index()
    {
        header("Location: " . BASEURL . "/dashboard");
    }
}