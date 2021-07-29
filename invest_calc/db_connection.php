<?php

const DB_HOST= "mysql:dbname=invest_index;host=127.0.0.1;charset=utf8";
const DB_USER = "xxxx";
const DB_PASSWORD="xxxx";


// 例外処理
try {
    $pdo= new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,]);
    echo "接続成功";
} catch (PDOException $e) {
    echo "接続失敗" . $e->getMessage() . "\n";
    exit();
}

