<?php

class WSFramework {

    public static function run() {
        define('FRAMEWORK_ROOT', BASE_PATH . '/__MyFramework/');
        define('WEB_ROOT', BASE_PATH . '/__MyWeb/');
        
        // System
        require_once FRAMEWORK_ROOT . '/system/Object.php';
        require_once FRAMEWORK_ROOT . '/system/Core.php';
        require_once FRAMEWORK_ROOT . '/system/Controller.php';
        require_once FRAMEWORK_ROOT . '/system/Model.php';
        require_once FRAMEWORK_ROOT . '/system/View.php';
        require_once FRAMEWORK_ROOT . '/system/Web.php';
        
        // Library
        require_once FRAMEWORK_ROOT . '/library/Message.php';
        require_once FRAMEWORK_ROOT . '/library/Content.php';
        require_once FRAMEWORK_ROOT . '/library/Database.php';
        require_once FRAMEWORK_ROOT . '/library/Session.php';
        require_once FRAMEWORK_ROOT . '/library/URL.php';
        require_once FRAMEWORK_ROOT . '/library/Src.php';
        require_once FRAMEWORK_ROOT . '/library/Parser.php';
        require_once FRAMEWORK_ROOT . '/library/Plugin.php';
        require_once FRAMEWORK_ROOT . '/library/Form.php';
        require_once FRAMEWORK_ROOT . '/library/Validation.php';
        require_once FRAMEWORK_ROOT . '/library/Method.php';
        
        // Website Rooter
        require_once WEB_ROOT . 'Router.php';
        
        Core::build();
    }

}