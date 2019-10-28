<?php

//変数入る時だけダブルクォート
//シングルクォートの方が早いよ

//DBに接続
$host = "localhost"; //MySQLがインストールされてるコンピュータ
$dbname = "reservation_form"; //使用するDB
$charset = "utf8mb4"; //文字コード
$user = 'root'; //MySQLにログインするユーザー名
$password = '';//ユーザーのパスワード
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
try{
    $dbh = new PDO($dsn, $user, $password, $options);
}catch (\PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
