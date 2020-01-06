<?php

//database type
$config['db']['dbtype'] = 'mysql';

//for mysql
$config['db']['host'] = '127.0.0.1';
$config['db']['username'] = 'root';
$config['db']['password'] = '';
$config['db']['dbname'] = 'app1';

//for sqlite
$config['db']['dsn'] = 'sqlite:./Database/155126.db';

//for module
$config['defaultModule'] = 'Home';
$config['defaultController'] = 'Index';
$config['defaultAction'] = 'index';

//for email
$config['EmailUsername'] = "@gmail.com";
$config['EmailPassword'] = "";

return $config;