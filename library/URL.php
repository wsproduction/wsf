<?php

class URL {

    function __construct() {
        
    }

    public static function redirect($url) {
        header('Location: ' . $url);
    }

    public static function cekService() {
        if (isset ($_SERVER['HTTPS']) == 'on')
            return true;
        else
            return false;
    }

    public static function getService() {
        if (self::cekService())
            $ptcl = 'https';
        else
            $ptcl = 'http';

        return $ptcl;
    }
    
    public static function link($url, $label,$echo='echo',$properties=array()){
        $p = '';
        if (count($properties)>0){
            foreach ($properties as $key => $value) {
                $p .= ' ' . $key . '=' . $value;
            }
        }
        $link = '<a href="' . $url . '" ' . $p .' >' . $label . '</a>';
        if ($echo=='echo') {
            echo $link;
        } else if ($echo == 'attach') {
            return $link;
        }
    }

}
