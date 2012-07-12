<?php

class Controller {

    function __construct() {
        $this->view = $this->loadView();
        $this->url = $this->loadURL();
        $this->message = $this->loadMessage();
        $this->content = $this->loadContent();
        
        Src::plugin()->jQuery();
        Src::plugin()->jQueryCookie();
        Src::plugin()->jQueryUI();
        Src::plugin()->jDialogBox();
    }

    public function loadModel($name) {
        $path = Web::path() . 'models/' . $name . 'Model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $name . 'Model';
            $this->model = new $modelName();
        }
    }

    public function loadView() {
        return new View();
    }

    public function loadURL() {
        return new URL();
    }

    public function loadMessage() {
        $class = new Message();
        return $class->loadControllers();
    }
    
    public function loadContent() {
        $class = new Content();
        return $class->loadControllers();
    }
}