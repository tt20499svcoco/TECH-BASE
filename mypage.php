<?php
    // データベースに接続
    $dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
    $user = 'ユーザー名';
    $pass = 'パスワード';
    $pdo = new PDO($dsn,$user,$pass);

/////////////////////////////////////////////////////////////////////////////////////////

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>マイページ</title>
		<link rel="stylesheet" href="mypage.css" type="text/css">
	</head>
	<body style="background: radial-gradient(#F2B9A1, #EA6264) fixed;">
		<tb style="background-color:#000000;" align = "left" valign = "top"><a href="mypage.php"><font = color="white">マイページ</font></a>&nbsp;&nbsp;<a href="list.php"><font = color="white">生徒一覧表</font></a>&nbsp;&nbsp;<a href="student.php"><font = color="white">登録削除編集</font></a>&nbsp;&nbsp;<a href="student_confirmation.php"><font = color="white">確認</font></a>&nbsp;&nbsp;<a href="login12.php"><font = color="white">ログアウト</font></a></tb><br>
		<div>
		  <font size ="20"><p>ようこそ！</p></font>
		  <p>サイトにアクセスしてくれてありがとうございます<br>このサイトは誰でも自由に生徒の情報保存できます<br>まずは自分のしたいページへ行きましょう</p>
		</div>
	</body>
</html>