<?php

class Model {

    function __construct() {
        try {
            $this->db = new Database();
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

}
