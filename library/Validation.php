<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validation
 *
 * @author WS
 */
class Validation {

    public static $type = array();
    public static $msg = array();
    public static $remote = array();

    function __construct() {
        
    }

    public function requaired($message = null) {
        self::$type[] = 'required : true';
        if (isset($message)) {
            self::$msg[] = 'required : "' . $message . '"';
        }
    }
    
    public function number($message = null) {
        self::$type[] = 'number : true';
        if (isset($message)) {
            self::$msg[] = 'number : "' . $message . '"';
        }
    }

    public function email($message = null) {
        self::$type[] = 'email : true';
        if (isset($message)) {
            self::$msg[] = 'email : "' . $message . '"';
        }
    }

    public function equalTo($equalTo = null, $message = null) {
        self::$type[] = 'equalTo : "' . $equalTo . '"';
        if (isset($message)) {
            self::$msg[] = 'equalTo : "' . $message . '"';
        }
    }

    public function minLength($length = null, $message = null) {
        self::$type[] = 'minlength : ' . $length;
        if (isset($message)) {
            self::$msg[] = 'minlength : "' . $message . '"';
        }
    }

    public function maxLength($length = null, $message = null) {
        self::$type[] = 'maxlength : ' . $length;
        if (isset($message)) {
            self::$msg[] = 'maxlength : "' . $message . '"';
        }
    }

    public function rangeLength($minLength = null, $maxLength = null, $message = null) {
        self::$type[] = 'rangelength : [' . $minLength . ',' . $maxLength . ']';
        if (isset($message)) {
            self::$msg[] = 'rangelength : "' . $message . '"';
        }
    }

    public function min($number = null, $message = null) {
        self::$type[] = 'min : ' . $number;
        if (isset($message)) {
            self::$msg[] = 'min : "' . $message . '"';
        }
    }

    public function max($number = null, $message = null) {
        self::$type[] = 'max : ' . $number;
        if (isset($message)) {
            self::$msg[] = 'max : "' . $message . '"';
        }
    }

    public function range($minNumber = null, $maxNumber = null, $message = null) {
        self::$type[] = 'range : [' . $minNumber . ',' . $maxNumber . ']';
        if (isset($message)) {
            self::$msg[] = 'range : "' . $message . '"';
        }
    }

    public function url($message = null) {
        self::$type[] = 'url : true';
        if (isset($message)) {
            self::$msg[] = 'url : "' . $message . '"';
        }
    }

    public function accept($extensions = null, $message = null) {
        self::$type[] = 'accept : "' . $extensions . '"';
        if (isset($message)) {
            self::$msg[] = 'accept : "' . $message . '"';
        }
    }

    public function remote($url = null, $type = null, $data = array()) {
        isset($url) ? self::$remote['url'] = $url : null;
        isset($type) ? self::$remote['type'] = $type : null;

        if (!empty($data)) {
            if (is_array($data)) {
                $d = '{ ';
                $count = count($data);
                $idx = 1;
                foreach ($data as $key => $value) {
                    if (preg_match("/^#[A-Z,a-z,0-9]/", $value)) {
                        $d .= $key . ': function(){return $("' . $value . '").val();}';
                    } else {
                        $d .= $key . ': "' . $value . '"';
                    }

                    if ($idx < $count) {
                        $d .= ',';
                    }
                    $idx++;
                }
                $d .= '}';

                self::$remote['data'] = $d;
            }
        }
    }

    public static function reset() {
        self::$type = array();
        self::$msg = array();
        self::$remote = array();
    }

}

class InputType {

    public static $inputTypeID;
    public static $list;

    function __construct($id) {
        self::$inputTypeID = $id;
    }

    public function alphaNumeric($allow = null) {
        if (isset($allow)) {
            self::$list[] = '$("#' . self::$inputTypeID . '").alphanumeric({allow: "' . $allow . '"});';
        } else {
            self::$list[] = '$("#' . self::$inputTypeID . '").alphanumeric();';
        }
    }

    public function numeric($allow = null) {
        if (isset($allow)) {
            self::$list[] = '$("#' . self::$inputTypeID . '").numeric({allow: "' . $allow . '"});';
        } else {
            self::$list[] = '$("#' . self::$inputTypeID . '").numeric();';
        }
    }
    
    public function alpha($nocaps = false) {
        if ($nocaps) {
            self::$list[] = '$("#' . self::$inputTypeID . '").alpha({nocaps: ' . $nocaps . '});';
        } else {
            self::$list[] = '$("#' . self::$inputTypeID . '").alpha();';
        }
    }

    public function prevent($char = null) {
        self::$list[] = '$("#' . self::$inputTypeID . '").alphanumeric({ichars: "' . $char . '"});';
    }

}