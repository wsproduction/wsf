<?php

class Web {

    public static $host;
    public static $webName;
    public static $webAlias;
    public static $webFolder;
    public static $webTemplate;
    public static $title;
    public static $listChild = array();
    public static $childStatus;

    function __construct() {
        
    }
    
    public static function getSubDomain() {
        $subdomain = explode('.', self::$host);
        return $subdomain[0];
    }

    public static function title($text = '', $boolWebName = false, $sparator = '') {
        $title = $text;
        if ($boolWebName) {
            $title = self::$webName . ' ' . $sparator . ' ' . $text;
        }
        self::$title = $title;
    }

    public static function main($webName = '', $webFolder = '', $webTemplate = '') {
        self::$webName = $webName;
        self::$webFolder = $webFolder;
        self::$webTemplate = $webTemplate;
    }

    public static function child($webName = '', $webAlias='', $webFolder = '', $webTemplate = '') {
        self::$listChild[$webAlias] = array( $webName, $webFolder, $webTemplate);
    }

    public static function path() {
        return WEB_ROOT . self::$webFolder . '/';
    }

    public static function config() {
        require self::path() . '/config/database.php';
    }

}
