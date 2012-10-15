<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Method
 *
 * @author ws
 */
class Method {

    public function __construct() {
        
    }

    public function post($variableName = '', $defaultValue = NULL) {
        if (isset($_POST[$variableName])) {
            $val = trim($_POST[$variableName]);
            $res = $defaultValue;
            if ($val != '') {
                $res = $val;
            }
            return $res;
        } else {
            return $defaultValue;
        }
    }

    public function get($variableName = '', $defaultValue = NULL) {
        if (isset($_GET[$variableName])) {
            $val = trim($_GET[$variableName]);
            $res = $defaultValue;
            if ($val != '') {
                $res = $val;
            }
            return $res;
        } else {
            return $defaultValue;
        }
    }

    public function files($variableName = '', $content = '') {
        return $_FILES[$variableName][$content];
    }

    public function isAjax() {
        $bool = false;
        if (isset($_SERVER['HTTP_REFERER'])) {
            $bool = true;
        }
        return $bool;
    }

}

?>
