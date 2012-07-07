<?php

class View {

    function __construct() {
        
    }

    public function render($name = '') {
        $path_layout = Web::path() . 'asset/template/' . Web::$webTemplate . '/application.html.php';
        $path_view = Web::path() . 'views/' . $name . '.html.php';

        $get_layout = self::getLayout($path_layout);
        $get_view = self::getView($path_view);

        if (!empty($get_layout)) {
            if (!empty($get_view)) {
                self::loadLayout($get_layout, $get_view);
            } else {
                echo 'View tidak ditemukan';
            }
        } else {
            echo 'Layout tidak ditemukan.';
        }
    }
    
    private static function getLayout($path) {
        $layout = null;
        if (file_exists($path)) {
            $layout = $path;
        }

        return $layout;
    }

    private static function getView($path) {
        $view = null;
        if (file_exists($path)) {
            $view = $path;
        }

        return $view;
    }
    
    private static function loadLayout($path_layout, $path_view) {

        // Mengambil semua variable yang sudah di daftarkan di Class Object
        $loadVars = Object::loadVars();
        foreach ($loadVars['view'] as $var => $value) {
            $$var = $value;
        }

        $layout = file_get_contents($path_layout);
        $view = file_get_contents($path_view);

        $str = str_replace('{PAGE_CONTENT}', $view, $layout);
        $out = self::setOneLine($str);

        $filename = Web::path() . 'asset/temp/' . time() . '.php';

        $file = fopen($filename, 'a');
        fwrite($file, $out);
        fclose($file);

        require $filename;

        unlink($filename);
    }

    private static function setOneLine($str) {
        // Merubah koding menjadi 1 baris
        $remove = array("\n", "\r\n", "\r");
        $new_str = str_replace($remove, '', $str);
        $new_str = preg_replace("/[\t\s]+/", " ", trim($new_str));
        $new_str = str_replace('> ', '>', $new_str);
        $new_str = str_replace('<?php', '<?php ', $new_str);
        return $new_str;
    }

}