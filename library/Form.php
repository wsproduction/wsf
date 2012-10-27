<?php

class Form {

    private static $frmID;
    private static $frmType;
    private static $frmName;
    private static $frmValue;
    private static $frmTipsId = array();
    private static $frmProperties = array();
    private static $frmValidation = array();
    private static $validationStatus = false;
    private static $passwordMeter = false;
    private static $passwordMeterID = array();
    private static $optionList;
    private static $typeAllowed = array('button', 'checkbox', 'file', 'hidden', 'image',
        'password', 'radio', 'reset', 'submit', 'text',
        'textarea', 'label', 'fieldset', 'select', 'optgroup');

    function __construct() {
        
    }

    public static function begin($name = '', $action = '', $method = '', $enctype = false) {
        self::$frmID = $name;
        if (Web::$childStatus) {
            $action = URL::getService() . '://' . Web::$host . '/' . Web::$webAlias . '/' . $action;
        } else {
            $action = URL::getService() . '://' . Web::$host . '/' . $action;
        }

        $valEnctype = '';
        if ($enctype) {
            $valEnctype = 'enctype="multipart/form-data"';
        }

        echo '<form id="' . $name . '" name="' . $name . '" action="' . $action . '" method="' . $method . '" ' . $valEnctype . '>';
    }

    public static function end() {
        echo ' </form>';
        echo '<script type="text/javascript">';
        echo '$(function(){';
        echo Parser::tipsID(self::$frmTipsId);
        echo Parser::validation(self::$frmID, self::$frmValidation);
        echo Parser::inputType(InputType::$list);
        echo Parser::passMeter(self::$passwordMeterID);
        echo '});';
        echo '</script>';

        self::resetVarAll();
    }

    private static function resetVarAll() {
        self::$frmID = '';
        self::$frmType = '';
        self::$frmName = '';
        self::$frmValue = '';
        self::$frmTipsId = array();
        self::$frmProperties = array();
        self::$frmValidation = array();
        self::$validationStatus = false;
        self::$passwordMeter = false;
        self::$passwordMeterID = array();
        self::$optionList = '';
        Validation::reset();
    }

    private static function resetVar() {
        self::$frmType = '';
        self::$frmName = '';
        self::$frmValue = '';
        self::$optionList = '';
        self::$frmProperties = array();
        self::$validationStatus = false;
        self::$passwordMeter = false;
        Validation::reset();
    }

    public static function create($type = null, $name = null) {

        self::resetVar();

        if (!empty($type)) {
            self::$frmType = $type;
        }

        if (!empty($name)) {
            self::$frmName = $name;
            self::$frmProperties['id'] = $name;
            self::$frmProperties['name'] = $name;
        }
    }

    public static function commit($ket = 'echo') {
        $t = self::$frmType;
        $p = Parser::attribute(self::$frmProperties);
        $f = '';
        if (in_array($t, self::$typeAllowed)) {
            if ($t == 'select' || $t == 'optgroup') {
                $f .= '<select ' . $p . '>';
                $f .= self::$optionList;
                $f .= '</select>';
            } elseif ($t == 'textarea') {
                $f .= '<textarea ' . $p . '>' . self::$frmValue . '</textarea>';
            } else {
                $v = '';
                if (isset(self::$frmValue))
                    $v = 'value="' . self::$frmValue . '"';
                $f .= '<input type="' . $t . '" ' . $v . ' ' . $p . ' />';

                //Password Meter
                if (self::$passwordMeter) {
                    if ($t == 'password') {
                        $f .= '<div id="pm_' . $t . '" class="neutral">Very Weak</div>';
                        self::$passwordMeterID[] = $t;
                    } else {
                        $f .= 'PassMeter can\'t use.';
                    }
                }
            }

            if ($ket == 'echo') {
                echo $f;
            } else if ($ket == 'attach') {
                return $f;
            }

            // Validation
            if (self::$validationStatus) {

                $type = Validation::$type;
                $msg = Validation::$msg;
                $remote = Validation::$remote;

                if (!empty($type)) {
                    // Config validation
                    self::$frmValidation[self::$frmName] = Parser::validationProperties($type, $msg, $remote);
                }
            }
        } else {
            echo ' Type ' . $t . ' can\'t create.';
        }
    }

    public static function value($param = null) {
        if (isset($param)) {
            self::$frmValue = $param;
        }
    }

    public static function tips($tips) {
        if (isset($tips)) {
            self::$frmProperties['tips'] = $tips;
            array_push(self::$frmTipsId, self::$frmName);
        }
    }

    public static function style($class) {
        if (isset($class)) {
            self::$frmProperties['class'] = $class;
        }
    }

    public static function maxlength($number) {
        if (isset($number)) {
            self::$frmProperties['maxlength'] = $number;
        }
    }

    public static function size($x = null, $y = null) {
        $type = self::$frmType;
        if ($type == 'text' || $type == 'select' || $type == 'password') {
            isset($x) ? self::$frmProperties['size'] = $x : null;
        } elseif ($type == 'textarea') {
            isset($x) ? self::$frmProperties['cols'] = $x : null;
            isset($y) ? self::$frmProperties['rows'] = $y : null;
        }
    }

    public static function validation() {
        self::$validationStatus = true;
        return new Validation();
    }

    public static function inputType() {
        return new InputType(self::$frmName);
    }

    public static function option($optionList = array(), $optionDefault = '', $selected = '') {
        if (self::$frmType == 'select') {
            $ol = Parser::selectList($optionList, $optionDefault, $selected);
        } elseif (self::$frmType == 'optgroup') {
            $ol = Parser::optgroupList($optionList, $optionDefault, $selected);
        }
        self::$optionList = $ol;
    }

    public static function label($title = null, $for = null, $echo = true) {
        $label = '<label for="' . $for . '">' . $title . '</label>';
        if ($echo) {
            echo $label;
        } else {
            return $label;
        }
    }

    public static function passMeter() {
        self::$passwordMeter = true;
    }

    public static function properties($array = array()) {
        if (count($array) > 0) {
            foreach ($array as $key => $value) {
                self::$frmProperties[$key] = $value;
            }
        }
    }

}