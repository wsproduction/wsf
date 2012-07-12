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

    /* {LIST PLUGIN - Javascript} */

    public function jQuery() {
        $file = 'jquery-1.7.1.js';
        $urlService = URL::getService();
        $path = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/' . $file;
        array_push(Src::$plugin, $path);
    }

    public function jQueryCookie() {
        $file = 'jquery.cookie.js';
        $urlService = URL::getService();
        $path = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/' . $file;
        array_push(Src::$plugin, $path);
    }

    public function jQueryUI() {
        $file = 'jquery-ui-1.8.13.custom.min.js';
        $css = 'css/smoothness/jquery-ui-1.8.13.custom.css';
        
        $urlService = URL::getService();
        $path = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/jquery-ui/' . $file;
        array_push(Src::$plugin, $path);
        
        $path_css = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/jquery-ui/' . $css;
        array_push(Src::$css, $path_css);
    }

    public function jQueryValidation() {
        $file = 'jquery.validate.js';
        $urlService = URL::getService();
        $path = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/' . $file;
        array_push(Src::$plugin, $path);
    }

    public function jQueryAlphaNumeric() {
        $file = 'jquery.alphanumeric.pack.js';
        $urlService = URL::getService();
        $path = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/' . $file;
        array_push(Src::$plugin, $path);
    }

    public function poshytip() {
        $js = 'jquery.poshytip.js';
        $config = 'config.poshytip.js';
        $css = 'tip-twitter/tip-twitter.css';

        $urlService = URL::getService();
        $path_js = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/poshytip/' . $js;
        array_push(Src::$plugin, $path_js);

        $urlService = URL::getService();
        $path_js = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/poshytip/' . $config;
        array_push(Src::$plugin, $path_js);

        $path_css = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/poshytip/' . $css;
        array_push(Src::$css, $path_css);
    }
    
    public function passwordMeter() {
        $js = 'jquery.pwdMeter.js';
        $css = 'style.css';
        
        $urlService = URL::getService();
        $path_js = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/passwordmeter/' . $js;
        array_push(Src::$plugin, $path_js);
        
        $path_css = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/passwordmeter/' . $css;
        array_push(Src::$css, $path_css);
    }
    
    public function flexDropDown() {
        $js = 'flexdropdown.js';
        $css = 'flexdropdown.css';
        
        $urlService = URL::getService();
        $path_js = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/flexdropdown/' . $js;
        array_push(Src::$plugin, $path_js);
        
        $path_css = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/flexdropdown/' . $css;
        array_push(Src::$css, $path_css);
    }
    
    public function cleditor() {
        $js = 'jquery.cleditor.js';
        $css = 'jquery.cleditor.css';
        
        $urlService = URL::getService();
        $path_js = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/cleditor130/' . $js;
        array_push(Src::$plugin, $path_js);
        
        $path_css = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/cleditor130/' . $css;
        array_push(Src::$css, $path_css);
    }
    
    public function elrte() {
        $js = 'js/elrte.min.js';
        $language = 'js/i18n/elrte.ru.js';
        $css = 'css/elrte.min.css';
        
        $urlService = URL::getService();
        $path_js = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/elrte13/' . $js;
        array_push(Src::$plugin, $path_js);
        
        $path_js = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/elrte13/' . $language;
        array_push(Src::$plugin, $path_js);
        
        $path_css = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/elrte13/' . $css;
        array_push(Src::$css, $path_css);
    }
    
    public function jDialogBox() {
        $js = 'js/jquery.reveal.js';
        $css = 'css/styles.css';
        
        $urlService = URL::getService();
        $path_js = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/dialogbox/' . $js;
        array_push(Src::$plugin, $path_js);
        
        $path_css = $urlService . '://' . Web::$host . '/__MyFramework/plugin/js/dialogbox/' . $css;
        array_push(Src::$css, $path_css);
    }

}

