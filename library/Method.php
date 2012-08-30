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

    public function post($variableName = '') {
        $val = trim($_POST[$variableName]);
        $res = NULL;
        if ($val!='') {
            $res = $val;
        }
        return $res;
    }

}

?>
