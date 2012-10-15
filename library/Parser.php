<?php

class Parser {

    function __construct() {
        
    }

    public static function attribute($param = array()) {
        $attr = '';
        if (isset($param)) {
            foreach ($param as $key => $value) {
                $attr .= ' ' . $key . '="' . $value . '"';
            }
        }
        return $attr;
    }

    public static function javascript($param = array()) {
        $js = '';
        if (isset($param)) {
            foreach ($param as $value) {
                $js .= '<script type="text/javascript" src="' . $value . '"></script>';
            }
        }
        return $js;
    }

    public static function css($param = array()) {
        $css = '';
        if (isset($param)) {
            foreach ($param as $value) {
                $css .= '<link rel="stylesheet" type="text/css" href="' . $value . '" />';
            }
        }
        return $css;
    }

    public static function tipsID($param = array()) {
        $other = '';
        if (isset($param)) {
            foreach ($param as $value) {
                $other .= 'form_tips("' . $value . '");';
            }
        }
        return $other;
    }

    public static function selectList($param = array(), $optionDefault = '', $selected = '') {
        $os = '';

        if ($optionDefault != '') {
            $os .= '<option value="">' . $optionDefault . '</option>';
        }

        if (is_array($param)) {
            if (!empty($param)) {
                foreach ($param as $value => $text) {
                    if ($selected == $value) {
                        $sttSelected = 'selected';
                    } else {
                        $sttSelected = '';
                    }
                    $os .= '<option value="' . $value . '" ' . $sttSelected . ' >' . $text . '</option>';
                }
            }
        }
        return $os;
    }

    public static function optgroupList($param = array(), $optionDefault = '', $selected = '') {
        $os = '';

        if ($optionDefault != '') {
            $os .= '<option value="">' . $optionDefault . '</option>';
        }

        if (isset($param)) {
            if (is_array($param)) {
                foreach ($param as $label => $optionList) {
                    if (is_array($optionList)) {
                        $os .= '<optgroup label="' . $label . '" >';
                        foreach ($optionList as $value => $text) {
                            if ($selected == $value) {
                                $sttSelected = 'selected';
                            } else {
                                $sttSelected = '';
                            }
                            $os .= '<option value="' . $value . '" ' . $sttSelected . ' >' . $text . '</option>';
                        }
                        $os .= '</optgroup>';
                    }
                }
            }
        }
        return $os;
    }

    public static function webCheck($param) {
        $res = false;

        foreach (Web::$listChild as $key => $value) {
            if ($param == $key) {
                $res = true;
                break;
            }
        }

        return $res;
    }

    public static function validationProperties($type = array(), $msg = array(), $remote = array()) {
        $properties = '';

        if (!empty($type)) {
            $count = count($type);
            $idx = 1;
            foreach ($type as $value) {
                $properties .= $value;
                if ($idx < $count) {
                    $properties .= ',';
                }
                $idx++;
            }
        }

        if (!empty($msg)) {
            $properties .= ', messages : {';
            $count = count($msg);
            $idx = 1;
            foreach ($msg as $value) {
                $properties .= $value;
                if ($idx < $count) {
                    $properties .= ',';
                }
                $idx++;
            }
            $properties .= '}';
        }

        if (!empty($remote)) {
            $properties .= ', remote : {';
            $count = count($remote);
            $idx = 1;
            foreach ($remote as $key => $value) {
                if ($key == 'data') {
                    $properties .= $key . ' : ' . $value;
                } else {
                    $properties .= $key . ' : "' . $value . '"';
                }

                if ($idx < $count) {
                    $properties .= ',';
                }
                $idx++;
            }
            $properties .= '}';
        }

        return $properties;
    }

    public static function validation($formName, $param = array()) {
        $val = '';
        if (!empty($param)) {
            $val .= '$("#' . $formName . '").validate();';
            foreach ($param as $key => $value) {
                $val .= '$("#' . $formName . ' #' . $key . '").rules("add",';
                $val .= '{ ' . $value . ' }';
                $val .= ');';
            }
        }

        return $val;
    }

    public static function inputType($param = array()) {
        $val = '';
        if (!empty($param)) {
            foreach ($param as $value) {
                $val .= $value;
            }
        }

        return $val;
    }

    public static function passMeter($param = array()) {
        $val = '';
        if (!empty($param)) {
            foreach ($param as $value) {
                $val .= '$("#' . $value . '").pwdMeter({outputID:"#pm_' . $value . '"});';
            }
        }

        return $val;
    }

}