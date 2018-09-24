<?php
////////////////////テーブル（本登録用）///////////////////////////////////////////////
try{
    // データベースに接続
    $dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
    $user = 'ユーザー名';
    $pass = 'パスワード';
    $pdo = new PDO($dsn,$user,$pass);

    $sql = 'CREATE TABLE member (
	id 				INT 			NOT NULL AUTO_INCREMENT PRIMARY KEY,
	account 		VARCHAR(50) 	NOT NULL,
	mail 			VARCHAR(50) 	NOT NULL,
	password 		VARCHAR(128) 	NOT NULL,
	flag 			TINYINT(1) 		NOT NULL DEFAULT 1
	)';

    $result = $pdo -> query($sql);  //SQL実行
}
catch (PDOException $e) {

    // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
    // ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}
?>