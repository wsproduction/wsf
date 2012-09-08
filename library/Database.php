<?php

class Database extends PDO {

    function __construct() {
        switch (DB_TYPE) {
            case 'mysql':
                $DSN = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
                break;
            case 'odbc':
                $DSN = 'odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=' . DB_DIR;
                break;
            default:
                break;
        }
        parent::__construct($DSN, DB_USER, DB_PASS);
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
    
    public function lastInsID($fieldName='', $tableName='') {
        $sth = $this->prepare('SELECT MAX(' . $fieldName . ') AS lastID FROM ' . $tableName);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $res = $sth->fetchAll();
        return $res[0]['lastID'];
    }
}