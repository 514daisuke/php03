<?php

function connect_to_db()
{
    // DB接続情報
    $dbn = 'mysql:dbname=gsacf_d08_05_prod;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続 new PDOを returnする
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}




