<?php
    
    use Mai\Load;
    date_default_timezone_set("Asia/Singapore");
    session_start();

    define('APP_PATH', __DIR__ .'/');
    require './Mai/Load.php';
    $config = require(APP_PATH . 'config/config.php');

    
    (new Load($config))->run();
