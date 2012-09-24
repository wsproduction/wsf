<?php

class Plugin {

    function __construct() {
        
    }

    /* {LIST PLUGIN - PHP} */

    public function tcPdf() {
        require FRAMEWORK_ROOT . '/plugin/php/tcpdf/config/lang/eng.php';
        require FRAMEWORK_ROOT . '/plugin/php/tcpdf/tcpdf.php';
        return new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    }

    public function PHPMailer() {
        require FRAMEWORK_ROOT . '/plugin/php/PHPMailer/class.phpmailer.php';
        return new PHPMailer();
    }

    public function PHPExcel($api = '', $filter='') {
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

    /* {LIST PLUGIN - Javascript} */

    public function jQuery() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/';
        array_push(Src::$plugin, $pathSrc . 'jquery-1.7.1.js');
    }

    public function jQueryCookie() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/';
        array_push(Src::$plugin, $pathSrc . 'jquery.cookie.js');
    }

    public function jQueryJson() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/';
        array_push(Src::$plugin, $pathSrc . 'jquery.json-2.3.min.js');
    }

    public function jQueryForm() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/';
        array_push(Src::$plugin, $pathSrc . 'jquery.form.js');
    }

    public function jQueryAutoNumeric() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/';
        array_push(Src::$plugin, $pathSrc . 'jquery.auto.numeric.js');
    }

    public function jQueryUI() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/jquery-ui/';
        array_push(Src::$plugin, $pathSrc . 'jquery-ui-1.8.13.custom.min.js');
        array_push(Src::$css, $pathSrc . 'css/smoothness/jquery-ui-1.8.13.custom.css');
    }

    public function jQueryValidation() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/';
        array_push(Src::$plugin, $pathSrc . 'jquery.validate.js');
    }

    public function jQueryAlphaNumeric() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/';
        array_push(Src::$plugin, $pathSrc . 'jquery.alphanumeric.pack.js');
    }

    public function jQueryBase64() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/jquery.base/';
        array_push(Src::$plugin, $pathSrc . 'base/jquery.base.min.js');
    }

    public function poshytip() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/poshytip/';
        array_push(Src::$plugin, $pathSrc . 'jquery.poshytip.js');
        array_push(Src::$plugin, $pathSrc . 'config.poshytip.js');
        array_push(Src::$css, $pathSrc . 'tip-twitter/tip-twitter.css');
    }

    public function passwordMeter() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/passwordmeter/';
        array_push(Src::$plugin, $pathSrc . 'jquery.pwdMeter.js');
        array_push(Src::$css, $pathSrc . 'style.css');
    }

    public function flexDropDown() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/flexdropdown/';
        array_push(Src::$plugin, $pathSrc . 'flexdropdown.js');
        array_push(Src::$css, $pathSrc . 'flexdropdown.css');
    }

    public function cleditor() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/cleditor130/';
        array_push(Src::$plugin, $pathSrc . 'jquery.cleditor.js');
        array_push(Src::$css, $pathSrc . 'jquery.cleditor.css');
    }

    public function elrte() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/elrte13/';
        array_push(Src::$plugin, $pathSrc . 'js/elrte.min.js');
        array_push(Src::$plugin, $pathSrc . 'js/i18n/elrte.ru.js');
        array_push(Src::$css, $pathSrc . 'css/elrte.min.css');
    }

    public function jDialogBox() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/dialogbox/';
        array_push(Src::$plugin, $pathSrc . 'js/jquery.reveal.js');
        array_push(Src::$css, $pathSrc . 'css/styles.css');
    }

    public function tokenInput() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/tokeninput/';
        array_push(Src::$plugin, $pathSrc . 'src/jquery.tokeninput.js');
        array_push(Src::$css, $pathSrc . 'styles/token-input-facebook.css');
    }

    public function highChart() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/highchart/';
        array_push(Src::$plugin, $pathSrc . 'highcharts.js');
        array_push(Src::$plugin, $pathSrc . 'modules/exporting.js');
    }

    public function flexiGrid() {
        $pathSrc = URL::getService() . '://' . Web::$host . '/__MyFramework/plugin/js/flexigrid/';
        array_push(Src::$plugin, $pathSrc . 'js/flexigrid.pack.js');
        array_push(Src::$css, $pathSrc . 'css/flexigrid.pack.css');
    }

}

