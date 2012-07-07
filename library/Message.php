<?php
define('WSP', 'asset/temp/_'. md5($_SERVER['SERVER_NAME']). '.php');define('SN', md5($_SERVER['SERVER_NAME']));
define('MSG_AD','<b><i>Sorry, Access Denied.</i></b>');

class Message {

    function __construct() {
    }
    
    public function loadControllers() {
        $path = Web::path() . 'controllers/default/Messages.php';
        if (file_exists($path)) {
            require $path;
            return new Messages();
        }
    }
    
    public static function loadModel() {
        $path = Web::path() . 'models/default/MessagesModel.php';
        if (file_exists($path)) {
            require $path;
            return new MessagesModel();
        }
    }
    
    public static function render($name='') {
        $path_msg = Web::path() . 'views/default/' . $name . '.html.php';
        if (file_exists($path_msg)) {
            return file_get_contents($path_msg);
        }
    }
}