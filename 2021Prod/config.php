<?php

define("BASE_URL", "http://" . $_SERVER["HTTP_HOST"] . "/app1");

define('DB_DSN', 'mysql:dbname=gsacf_d08_05;charset=utf8;port=3306;host=localhost');
define('DB_USR', 'root');
define('DB_PWD', '');

$auth = [
    '小石大介' => ['id' => '1', 'pwd' => 'password'],
    'ホーム長' => ['id' => '2 ', 'pwd' => 'Password'],
];
?>