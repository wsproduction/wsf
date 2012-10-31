<?php

class Plugin {

    private $path_src;

    function __construct() {
        $this->path_src = URL::getService() . '://' . Web::$host . '/ws/24/f/src/asset/plugin/';
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

    /* {LIST PLUGIN - Javascript} */

    public function jQuery() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery-1.7.1.js');
        Src::$plugin[0] = $this->path_src . 'js/jquery-1.7.1.js';
    }
    
    public function jQueryUI() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery-ui/jquery-ui-1.8.13.custom.min.js');
        Src::$plugin[1] = $this->path_src . 'js/jquery-ui/jquery-ui-1.9.1.custom.js';
        array_push(Src::$css, $this->path_src . 'js/jquery-ui/css/smoothness/jquery-ui-1.8.13.custom.css');
    }

    public function jQueryJson() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.json-2.3.min.js');
        Src::$plugin[2] = $this->path_src . 'js/jquery.json-2.3.min.js';
    }

    public function jQueryForm() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.form.js');
        Src::$plugin[3] = $this->path_src . 'js/jquery.form.js';
    }

    public function jQueryAutoNumeric() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.auto.numeric.js');
        Src::$plugin[4] = $this->path_src . 'js/jquery.auto.numeric.js';
    }
    
    public function jQueryCookie() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.cookie.js');
        Src::$plugin[5] = $this->path_src . 'js/jquery.cookie.js';
    }

    public function jQueryValidation() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.validate.js');
        Src::$plugin[6] = $this->path_src . 'js/jquery.validate.js';
        Src::$plugin[26] = $this->path_src . 'js/jquery.validate.custom.js';
    }

    public function jQueryAlphaNumeric() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.alphanumeric.pack.js');
        Src::$plugin[7] = $this->path_src . 'js/jquery.alphanumeric.pack.js';
    }

    public function jQueryBase64() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.base/base/jquery.base.min.js');
        Src::$plugin[8] = $this->path_src . 'js/jquery.base/base/jquery.base.min.js';
    }

    public function poshytip() {
        //array_push(Src::$plugin, $this->path_src . 'js/poshytip/jquery.poshytip.js');
        //array_push(Src::$plugin, $this->path_src . 'js/poshytip/config.poshytip.js');
        Src::$plugin[9] = $this->path_src . 'js/poshytip/jquery.poshytip.js';
        Src::$plugin[10] = $this->path_src . 'js/poshytip/config.poshytip.js';
        array_push(Src::$css, $this->path_src . 'js/poshytip/tip-twitter/tip-twitter.css');
    }

    public function passwordMeter() {
        //array_push(Src::$plugin, $this->path_src . 'js/passwordmeter/jquery.pwdMeter.js');
        Src::$plugin[11] = $this->path_src . 'js/passwordmeter/jquery.pwdMeter.js';
        array_push(Src::$css, $this->path_src . 'js/passwordmeter/style.css');
    }

    public function flexDropDown() {
        //array_push(Src::$plugin, $this->path_src . 'js/flexdropdown/flexdropdown.js');
        Src::$plugin[12] = $this->path_src . 'js/flexdropdown/flexdropdown.js';
        array_push(Src::$css, $this->path_src . 'js/flexdropdown/flexdropdown.css');
    }

    public function cleditor() {
        //array_push(Src::$plugin, $this->path_src . 'js/cleditor130/jquery.cleditor.js');
        Src::$plugin[13] = $this->path_src . 'js/cleditor130/jquery.cleditor.js';
        array_push(Src::$css, $this->path_src . 'js/cleditor130/jquery.cleditor.css');
    }

    public function elrte() {
        //array_push(Src::$plugin, $this->path_src . 'js/elrte13/js/elrte.min.js');
        //array_push(Src::$plugin, $this->path_src . 'js/elrte13/js/i18n/elrte.ru.js');
        Src::$plugin[14] = $this->path_src . 'js/elrte13/js/elrte.min.js';
        Src::$plugin[15] = $this->path_src . 'js/elrte13/js/i18n/elrte.ru.js';
        array_push(Src::$css, $this->path_src . 'js/elrte13/css/elrte.min.css');
    }

    public function jDialogBox() {
        //array_push(Src::$plugin, $this->path_src . 'js/dialogbox/js/jquery.reveal.js');
        Src::$plugin[16] = $this->path_src . 'js/dialogbox/js/jquery.reveal.js';
        array_push(Src::$css, $this->path_src . 'js/dialogbox/css/styles.css');
    }

    public function tokenInput() {
        //array_push(Src::$plugin, $this->path_src . 'js/tokeninput/src/jquery.tokeninput.js');
        Src::$plugin[17] = $this->path_src . 'js/tokeninput/src/jquery.tokeninput.js';
        array_push(Src::$css, $this->path_src . 'js/tokeninput/styles/token-input-facebook.css');
    }

    public function highChart() {
        //array_push(Src::$plugin, $this->path_src . 'js/highchart/highcharts.js');
        //array_push(Src::$plugin, $this->path_src . 'js/highchart/modules/exporting.js');
        Src::$plugin[18] = $this->path_src . 'js/highchart/highcharts.js';
        Src::$plugin[19] = $this->path_src . 'js/highchart/modules/exporting.js';
    }

    public function flexiGrid() {
        //array_push(Src::$plugin, $this->path_src . 'js/flexigrid/js/flexigrid.pack.js');
        Src::$plugin[20] = $this->path_src . 'js/flexigrid/js/flexigrid.pack.js';
        array_push(Src::$css, $this->path_src . 'js/flexigrid/css/flexigrid.pack.css');
    }

    public function customScrollbar() {
        //array_push(Src::$plugin, $this->path_src . 'js/custom-scrollbar/jquery.mousewheel.min.js');
        //array_push(Src::$plugin, $this->path_src . 'js/custom-scrollbar/jquery.mCustomScrollbar.js');
        Src::$plugin[21] = $this->path_src . 'js/custom-scrollbar/jquery.mousewheel.min.js';
        Src::$plugin[22] = $this->path_src . 'js/custom-scrollbar/jquery.mCustomScrollbar.js';
        array_push(Src::$css, $this->path_src . 'js/custom-scrollbar/jquery.mCustomScrollbar.css');
    }

    public function jQueryAddress() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.address-1.4.min.js');
        Src::$plugin[23] = $this->path_src . 'js/jquery.address-1.4.min.js';
    }
    
    public function jQuerySelectBox() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.address-1.4.min.js');
        Src::$plugin[24] = $this->path_src . 'js/jquery.selectbox-0.2/js/jquery.selectbox-0.2.js';
        array_push(Src::$css, $this->path_src . 'js/jquery.selectbox-0.2/css/jquery.selectbox.css');
    }
    
    public function rLoader() {
        //array_push(Src::$plugin, $this->path_src . 'js/jquery.requireScript-1.2.1');
        Src::$plugin[25] = $this->path_src . 'js/rloader/rloader1.5.4_min.js';
    }

}

