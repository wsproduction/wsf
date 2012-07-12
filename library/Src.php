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
        $url = $urlService . '://' . Web::$host . '/__MyWeb/' . Web::$webFolder . '/asset/js/' . $name . '.js';
        $file = WEB_ROOT . Web::$webFolder . '/asset/js/' . $name . '.js';
        file_exists($file) ? array_push(self::$js, $url) : null;
    }

    public static function getJavascript() {
        echo Parser::javascript(self::$plugin);
        echo Parser::javascript(self::$js);
    }

    public static function css($name) {
        $urlService = URL::getService();
        $url = $urlService . '://' . Web::$host . '/__MyWeb/' . Web::$webFolder . '/asset/template/' . Web::$webTemplate . '/css/' . $name;
        array_push(self::$css, $url);
    }

    public static function getCss() {
        echo Parser::css(self::$css);
    }

    public static function image($file = null, $path = null, $attribute = array()) {
        $urlService = URL::getService();
        $attr = Parser::attribute($attribute);

        if (empty($path)) {
            echo '<img src="' . $urlService . '://' . Web::$host . '/__MyWeb/' . Web::$webFolder . '/asset/template/' . Web::$webTemplate . '/images/' . $file . '"' . $attr . '/>';
        } else {
            echo '<img src="' . $path . '/' . $file . '"' . $attr . '/>';
        }
    }

    public static function icon($file = null, $path = null) {
        $urlService = URL::getService();

        if (empty($path)) {
            echo '<link rel="icon" href="' . $urlService . '://' . Web::$host . '/__MyWeb/' . Web::$webFolder . '/asset/template/' . Web::$webTemplate . '/images/' . $file . '" />';
        } else {
            echo '<link rel="icon" href="' . $path . '/' . $file . '" />';
        }
    }

    public static function plugin() {
        return new Plugin();
    }

}