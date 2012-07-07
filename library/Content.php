<?php

class Content {

    function __construct() {
        
    }
    
    public function loadControllers() {
        $path = Web::path() . 'controllers/default/Contents.php';
        if (file_exists($path)) {
            require $path;
            return new Contents();
        }
    }
    
    public static function loadModel() {
        $path = Web::path() . 'models/default/ContentsModel.php';
        if (file_exists($path)) {
            require $path;
            return new ContentsModel();
        }
    }
    public static function render($name='') {
        $path_msg = Web::path() . 'views/default/' . $name . '.html.php';
        if (file_exists($path_msg)) {
            return file_get_contents($path_msg);
        }
    }
}