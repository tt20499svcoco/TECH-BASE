<?php
///////////////////////////テーブル（仮登録用でメールアドレスを保存する）//////////////////////////

try{
    // データベースに接続
    $dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
    $user = 'ユーザー名';
    $pass = 'パスワード';
    $pdo = new PDO($dsn,$user,$pass);

//テーブル作成
//uritoken:URLに含めるトークン。
//flag:デフォルトが0の状態で自動入力され、会員登録が完了した時に、値を1に置き換えます。
//TINYINT:整数型（-128から127）
	$sql = 'CREATE TABLE pre_member (
	id 				INT 			NOT NULL AUTO_INCREMENT PRIMARY KEY,
	urltoken 		VARCHAR(128) 	NOT NULL,
	mail 			VARCHAR(50) 	NOT NULL,
	date 			DATETIME 		NOT NULL,
	flag 			TINYINT(1) 		NOT NULL DEFAULT 0
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