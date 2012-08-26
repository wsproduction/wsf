<?php

class Model {

    function __construct() {
        $this->method = $this->loadMethod();
        
        if (DB_ACCESS) {
            try {
                $this->db = new Database();
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                exit;
            }
        }
    }
    
    public function loadMethod() {
        return new Method();
    }
}
