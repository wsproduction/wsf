<?php

class Database extends PDO {

    function __construct() {
        parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    public function enum($table_name = null, $field_name = null) {
        $sth = $this->prepare('SHOW COLUMNS FROM ' . $table_name . ' LIKE "' . $field_name . '"');
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_OBJ);
        $out = str_replace("enum('", "", $res[0]->Type);
        $out = str_replace("')", "", $out);
        $out = explode("','", $out);
        return $out;
    }
    
    public function cekDB() {
        echo 'dugi';
    }

}