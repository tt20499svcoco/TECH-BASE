<?php
//////////////////////本登録（登録完了）/////////////////////////////////////////////////
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策のトークン判定
if ($_POST['token'] != $_SESSION['token']){
	echo "不正アクセスの可能性あり";
	exit();
}

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

//データベース接続
$dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
$user = 'ユーザー名';
$pass = 'パスワード';
$pdo = new PDO($dsn,$user,$pass);

//エラーメッセージの初期化
$errors = array();

if(empty($_POST)) {
	header("Location: registration_mail_form.php");
	exit();
}

$mail = $_SESSION['mail'];
$account = $_SESSION['account'];
$password = $_SESSION['password'];
//パスワードのハッシュ化
$password_hash =  crypt($_SESSION['password'], PASSWORD_DEFAULT);

//ここでデータベースに登録する
try{
	//例外処理を投げる（スロー）ようにする
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//トランザクション開始
	$pdo->beginTransaction();

	//memberテーブルに本登録する
	$statement = $pdo->prepare("INSERT INTO member (account,mail,password) VALUES (:account,:mail,:password)");
	//プレースホルダへ実際の値を設定する
	$statement->bindValue(':account', $account, PDO::PARAM_STR);
	$statement->bindValue(':mail', $mail, PDO::PARAM_STR);
	$statement->bindValue(':password', $password_hash, PDO::PARAM_STR);
	$statement->execute();

	//pre_memberのflagを1にする
	$statement = $pdo->prepare("UPDATE pre_member SET flag=1 WHERE mail=(:mail)");
	//プレースホルダへ実際の値を設定する
	$statement->bindValue(':mail', $mail, PDO::PARAM_STR);
	$statement->execute();

	// トランザクション完了（コミット）
	$pdo->commit();

	//データベース接続切断
	$pdo = null;

	//セッション変数を全て解除
	$_SESSION = array();

	//セッションクッキーの削除・sessionidとの関係を探れ。つまりはじめのsesssionidを名前でやる
	if (isset($_COOKIE["PHPSESSID"])) {
    		setcookie("PHPSESSID", '', time() - 1800, '/');
	}

 	//セッションを破棄する
 	session_destroy();

 	/*
 	登録完了のメールを送信
 	*/

}catch (PDOException $e){
	//トランザクション取り消し（ロールバック）
	$pdo->rollBack();
	$errors['error'] = "もう一度やりなおして下さい。";
	print('Error:'.$e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
<title>会員登録完了画面</title>
<meta charset="utf-8">
</head>
<body style="background-color:#B1F9D0;">

<?php if (count($errors) === 0): ?>
<h1>会員登録完了画面</h1>

<p>登録完了いたしました。ログイン画面からどうぞ。</p>
<p><a href="login12.php">ログイン画面</a></p>

<?php elseif(count($errors) > 0): ?>

<?php
foreach($errors as $value){
	echo "<p>".$value."</p>";
}
?>

<?php endif; ?>

</body>
</html>