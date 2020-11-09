<?php

class Validate {
    public static function redirectWith($message, $type, $location)
    {
        Flasher::setFlash($message, $type);
        header("Location: " . BASEURL . $location);
    }
}