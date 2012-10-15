<?php

class Controller {
    
    function __construct() {
        $this->view = $this->loadView();
        $this->url = $this->loadURL();
        $this->message = $this->loadMessage();
        $this->content = $this->loadContent();
        $this->method = $this->loadMethod();
        $this->model = $this->loadModel();
    }

    public function loadModel() {
        $name = ucwords(MODEL_NAME);
        $path = Web::path() . 'models/' . $name . 'Model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $name . 'Model';
            return new $modelName();
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
    
    public function loadMethod() {
        return new Method();
    }
}