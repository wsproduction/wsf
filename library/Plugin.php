<?php

class Plugin {

    private $path_src;

    function __construct() {
        $this->path_src = URL::getService() . '://' . Web::$host . '/ws/24/f/src/asset/plugin/';
    }

    /* {LIST PLUGIN - PHP} */

    public function tcPdf($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false) {
        require FRAMEWORK_ROOT . '/plugin/php/tcpdf/config/lang/eng.php';
        require FRAMEWORK_ROOT . '/plugin/php/tcpdf/tcpdf.php';
        return new TCPDF($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }

    public function PHPMailer() {
        require FRAMEWORK_ROOT . '/plugin/php/PHPMailer/class.phpmailer.php';
        return new PHPMailer();
    }

    public function PHPExcel($api = '', $filter = '') {
        switch ($api) {
            case 'IOFactory':
                require FRAMEWORK_ROOT . '/plugin/php/PHPExcel/Classes/PHPExcel/IOFactory.php';
                break;
        }

        switch ($filter) {
            case 'chunkReadFilter':
                require FRAMEWORK_ROOT . '/plugin/php/PHPExcel/Filter/chunkReadFilter.php';
                break;
        }
    }

    public function PHPUploader() {
        require FRAMEWORK_ROOT . '/plugin/php/Uploader/Upload.php';
        return new Upload();
    }

    public function PHPImageResize() {
        require FRAMEWORK_ROOT . '/plugin/php/Uploader/ImageResize.php';
        return new ImageResize();
    }

    public function PHPDownloader() {
        require FRAMEWORK_ROOT . '/plugin/php/Downloader/class.chip_download.php';
        return new chip_download();
    }

    public function PHPTerbilang() {
        require FRAMEWORK_ROOT . '/plugin/php/Terbilang/class.terbilang.php';
        return new Terbilang();
    }

    /* {LIST PLUGIN - Javascript} */

    public function jQuery() {
        Src::$plugin[0] = $this->path_src . 'js/jquery-1.8.2.min.js';
    }

    public function jQueryUI($themes = 'smoothness') {
        Src::$plugin[1] = $this->path_src . 'js/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js';
        array_push(Src::$css, $this->path_src . 'js/jquery-ui-1.9.2.custom/css/' . $themes . '/jquery-ui-1.9.2.custom.min.css');
    }

    public function jQueryForm() {
        Src::$plugin[2] = $this->path_src . 'js/jquery.form.js';
    }

    public function jQueryAutoNumeric() {
        Src::$plugin[3] = $this->path_src . 'js/jquery.auto.numeric.js';
    }

    public function jQueryCookie() {
        Src::$plugin[4] = $this->path_src . 'js/jquery.cookie.js';
    }

    public function jQueryValidation() {
        Src::$plugin[5] = $this->path_src . 'js/jquery.validate.js';
        Src::$plugin[6] = $this->path_src . 'js/jquery.validate.custom.js';
    }

    public function jQueryAlphaNumeric() {
        Src::$plugin[7] = $this->path_src . 'js/jquery.alphanumeric.pack.js';
    }

    public function jQueryBase64() {
        Src::$plugin[8] = $this->path_src . 'js/jquery.base/base/jquery.base.min.js';
    }

    public function poshytip() {
        Src::$plugin[9] = $this->path_src . 'js/poshytip/jquery.poshytip.js';
        Src::$plugin[10] = $this->path_src . 'js/poshytip/config.poshytip.js';
        array_push(Src::$css, $this->path_src . 'js/poshytip/tip-twitter/tip-twitter.css');
    }

    public function passwordMeter() {
        Src::$plugin[11] = $this->path_src . 'js/passwordmeter/jquery.pwdMeter.js';
        array_push(Src::$css, $this->path_src . 'js/passwordmeter/style.css');
    }

    public function elrte() {
        Src::$plugin[12] = $this->path_src . 'js/elrte13/js/elrte.min.js';
        Src::$plugin[13] = $this->path_src . 'js/elrte13/js/i18n/elrte.ru.js';
        array_push(Src::$css, $this->path_src . 'js/elrte13/css/elrte.min.css');
    }

    public function tokenInput() {
        Src::$plugin[14] = $this->path_src . 'js/tokeninput/src/jquery.tokeninput.js';
        array_push(Src::$css, $this->path_src . 'js/tokeninput/styles/token-input-facebook.css');
    }

    public function highChart() {
        Src::$plugin[15] = $this->path_src . 'js/highchart/highcharts.js';
        Src::$plugin[16] = $this->path_src . 'js/highchart/modules/exporting.js';
    }

    public function flexiGrid() {
        Src::$plugin[17] = $this->path_src . 'js/flexigrid/js/flexigrid.pack.js';
        array_push(Src::$css, $this->path_src . 'js/flexigrid/css/flexigrid.pack.css');
    }

    public function customScrollbar() {
        Src::$plugin[18] = $this->path_src . 'js/custom-scrollbar/jquery.mousewheel.min.js';
        Src::$plugin[19] = $this->path_src . 'js/custom-scrollbar/jquery.mCustomScrollbar.js';
        array_push(Src::$css, $this->path_src . 'js/custom-scrollbar/jquery.mCustomScrollbar.css');
    }

    public function jQueryAddress() {
        Src::$plugin[20] = $this->path_src . 'js/jquery.address-1.5.min.js';
    }

}

