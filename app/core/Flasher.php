<?php

class Flasher {
    public static function setFlash($title, $icon)
    {
        $_SESSION["flash"] = [
            "title" => $title,
            "icon" => $icon,
        ];
    }

    public static function flash()
    {
        if ( isset($_SESSION["flash"]) ) {
            echo "
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
              })
              
              Toast.fire({
                icon: '" . $_SESSION["flash"]["icon"] . "',
                title: '" . $_SESSION["flash"]["title"] . "'
              })
            ";

            unset($_SESSION["flash"]);
        }
    }
}