<?php

Web::$host = $_SERVER['SERVER_NAME']; 

Web::main('MAIN WEBSITE', 'main', 'elegant');
Web::child('ADMIN', 'demo', 'demo');

Web::config();
