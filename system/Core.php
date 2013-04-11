<?php

/*
 *  URL : http://wsframework.com/help/other/...
 *                                |     |
 *                                |     |
 *                                |     +---> Method / Properties => $url[1]
 *                                +----> Nama File & Class / Controllers => $url[0]
 */

class Core {

    function __construct() {
        
    }

    public static function build() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        /*
         * Cek URI 
         * Contoh : http://www.warmansuganda.com/a/b/c...
         * Apakah (a) termasuk kedalam anak web atau bukan, jika bukan berarti statusnya dianggap nama halaman
         */
        $ws = 0;
        if (Parser::webCheck($url[0])) {
            $ws = 1;
            $des_web = Web::$listChild[$url[0]];

            $webName = $des_web[0];
            $webFolder = $des_web[1];
            $webTemplate = $des_web[2];

            Web::main($webName, $webFolder, $webTemplate);
            Web::$webAlias = $url[0];
            Web::$childStatus = true;
        } else {
            Web::$childStatus = false;
        }


        # Load Data Configuration
        Web::config();

        if (self::execute()) {
            /*
             * Cek URI, Jika tidak ditemukan akan memanggil halaman default (index)
             */
            if (empty($url[0 + $ws])) {
                $default_page = Web::path() . 'controllers/Index.php';
                if (file_exists($default_page)) {
                    require $default_page;

                    if (class_exists('Index')) {
                        define('MODEL_NAME', 'Index');
                        $controller = new Index();

                        if (method_exists($controller, 'index')) {
                            Src::javascript('index');

                            /*
                             * Mengambil semua variable yang ada di Controllers
                             * untuk di daftarkan di Class Object, supaya $variable tersebut
                             * dapat di panggil di Views
                             */ Object::get_user_vars($controller);

                            $controller->index();
                        } else {
                            echo 'Method <b> index </b> tidak ditemukan pada Class <b> Index </b>';
                        }
                    } else {
                        echo "Class <b>Index</b> tidak ditemukan";
                    }
                } else {
                    echo '<i><b>Error 404 :</b> Halaman tidak ditemukan.</i>';
                    return false;
                }
                return false;
            }

            $file = Web::path() . 'controllers/' . ucwords($url[0 + $ws]) . '.php';
            if (file_exists($file)) {
                require $file;
            } else {
                echo '<i><b>Error 404 :</b> Halaman tidak ditemukan.</i>';
                return false;
            }

            if (class_exists($url[0 + $ws])) {
                define('MODEL_NAME', $url[0 + $ws]);
                $controller = new $url[0 + $ws] ( );

                Src::javascript($url[0 + $ws]);

                /*
                 * Mengambil semua variable yang ada di Controllers
                 * untuk di daftarkan di Class Object, supaya $variable tersebut
                 * dapat di panggil di Views
                 */ Object::get_user_vars($controller);

                if (isset($url[1 + $ws])) {
                    /*
                     * Statement ini dijalankan ketika nama method terdeklarasi id URL
                     */
                    if (method_exists($controller, $url[1 + $ws])) {

                        # Mendeklarasikan arguments
                        $arg_value = array();
                        $arg_idx_loop = 2;
                        $arg_status_loop = true;
                        while ($arg_status_loop) {
                            if (isset($url[$arg_idx_loop + $ws])) {
                                $arg_value[] = $url[$arg_idx_loop + $ws];
                            } else {
                                $arg_status_loop = false;
                            }
                            $arg_idx_loop++;
                        }

                        # Memanggil Method $url[1 + $ws] dengan argumen yang tidak terdefinisi
                        call_user_func_array(array($controller, $url[1 + $ws]), $arg_value);
                    } else {
                        echo 'Method <b>' . $url[1 + $ws] . '</b> tidak ditemukan pada Class <b>' . ucwords($url[0 + $ws]) . '</b>';
                    }
                } else {
                    $controller->index();
                }
            } else {
                echo 'Class <b>' . $url[0 + $ws] . '<b> tidak ditemukan';
            }
        } else {
            echo MSG_AD;
        }
    }

    private static function execute() {
        $ket = false;
        if (file_exists(Web::path() . WSP)) {
            $ket = true;
        }
        return $ket;
    }

}