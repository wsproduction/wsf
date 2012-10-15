<?php

class Src {

    public static $plugin = array();
    public static $js = array();
    public static $attach_js = array();
    public static $onload_js = array();
    public static $css = array();

    function __construct() {
        
    }

    public static function javascript($name) {
        $urlService = URL::getService();
        $url = $urlService . '://' . Web::$host . '/web/src/' . Web::$webFolder . '/asset/js/' . $name . '.js';
        $file = WEB_ROOT . Web::$webFolder . '/asset/js/' . $name . '.js';
        file_exists($file) ? array_push(self::$js, $url) : null;
    }

    public static function getJavascript() {
        $js = '';
        ksort(self::$plugin);
        $js .= Parser::javascript(self::$plugin);
        $js .= Parser::javascript(self::$js);
        return $js;
    }

    public static function css($name) {
        $urlService = URL::getService();
        $url = $urlService . '://' . Web::$host . '/web/src/' . Web::$webFolder . '/asset/template/' . Web::$webTemplate . '/css/' . $name . '.css';
        $file = WEB_ROOT . Web::$webFolder . '/asset/template/' . Web::$webTemplate . '/css/' . $name . '.css';
        file_exists($file) ? array_push(self::$css, $url) : null;
    }

    public static function getCss() {
        $css = '';
        $css .= Parser::css(self::$css);
        return $css;
    }

    public static function image($file = null, $path = null, $attribute = array()) {
        $urlService = URL::getService();
        $attr = Parser::attribute($attribute);
        $img = '';

        if (empty($path)) {
            $img = '<img src="' . $urlService . '://' . Web::$host . '/web/src/' . Web::$webFolder . '/asset/template/' . Web::$webTemplate . '/images/' . $file . '"' . $attr . '/>';
        } else {
            $img = '<img src="' . $path . '/' . $file . '"' . $attr . '/>';
        }

        return $img;
    }

    public static function icon($file = null, $path = null) {
        $urlService = URL::getService();
        if (empty($path)) {
            echo '<link rel="icon" href="' . $urlService . '://' . Web::$host . '/web/src/' . Web::$webFolder . '/asset/template/' . Web::$webTemplate . '/images/' . $file . '" />';
        } else {
            echo '<link rel="icon" href="' . $path . '/' . $file . '" />';
        }
    }

    public static function plugin() {
        return new Plugin();
    }

}