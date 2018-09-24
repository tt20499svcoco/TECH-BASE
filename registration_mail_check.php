<?php
////////////////////////仮登録（メール確認・送信）///////////////////////////////////////////
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策のトークン判定
if ($_POST['token'] != $_SESSION['token']){
	echo "不正アクセスの可能性あり";
	exit();	//if文終了
}

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

//データベース接続
$dsn = 'mysql:dbname=tt_204_99sv_coco_com;host=localhost;charset=utf8mb4';
$user = 'tt-204.99sv-coco';
$pass = 'uD4wiTym';
$pdo = new PDO($dsn,$user,$pass);

//エラーメッセージの初期化
$errors = array();

if(empty($_POST)) {
	header("Location: registration_mail_form.php");	//ファイルに飛ぶ
	exit();
}
else{
	//POSTされたデータを変数に入れる
	$mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
	//issetで値が入っていればその値を$mailに代入、入っていなければ、NULLを代入

	//メール入力判定
	if ($mail == ''){
		$errors['mail'] = "メールが入力されていません。";
	}
	else{
		if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)){	//$mailに/^・・・・・/が含まれないならば。
			$errors['mail_check'] = "メールアドレスの形式が正しくありません。";
		}
		//すでに使われているメールアドレスなら
		else{
			$sql = 'SELECT * FROM member';
			$results = $pdo -> query($sql);
			foreach ($results as $row) {
				if ($row['mail'] == $mail) {
					$errors['member_check'] = "このメールアドレスはすでに利用されております。";
				}
			}
		}
	}
}
if (count($errors) === 0){	//$errorsの中身が0個ならtrue

	$urltoken = hash('sha256',uniqid(rand(),1));
	$url = "http://tt-204.99sv-coco.com/registration_form.php"."?urltoken=".$urltoken;

	//ここでデータベースに登録する
	try{
		//例外処理を投げる（スロー）ようにする
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $pdo->prepare("INSERT INTO pre_member (urltoken,mail,date) VALUES (:urltoken,:mail,now() )");

		//プレースホルダへ実際の値を設定する
		$statement->bindValue(':urltoken', $urltoken, PDO::PARAM_STR);
		$statement->bindValue(':mail', $mail, PDO::PARAM_STR);
		$statement->execute();

		//データベース接続切断
		$pdo = null;

	}catch (PDOException $e){
		print('Error:'.$e->getMessage());
		die();	//exit()と同じ
	}

	//メールの宛先
	$mailTo = $mail;

	//Return-Pathに指定するメールアドレス
	$returnMail = 'csry16078@g.nihon-u.ac.jp';

	$name = "長野商店";
	$mail = 'csry16078@g.nihon-u.ac.jp';
	$subject = "【長野商店】会員登録用URLのお知らせ";

$body = <<< EOM
24時間以内に下記のURLからご登録下さい。
{$url}
EOM;

	mb_language('ja');
	mb_internal_encoding('UTF-8');

	//Fromヘッダーを作成
	$header = 'From: ' . mb_encode_mimeheader($name). ' <' . $mail. '>';

	if (mb_send_mail($mailTo, $subject, $body, $header, '-f'. $returnMail)) {

	 	//セッション変数を全て解除
		$_SESSION = array();

		//クッキーの削除
		if (isset($_COOKIE["PHPSESSID"])) {
			setcookie("PHPSESSID", '', time() - 1800, '/');
		}

 		//セッションを破棄する
 		session_destroy();

 		$message = "メールをお送りしました。24時間以内にメールに記載されたURLからご登録下さい。";

	 } else {
		$errors['mail_error'] = "メールの送信に失敗しました。";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>メール確認画面</title>
<meta charset="utf-8">
</head>
<body style="background-color:#B1F9D0;">
<h1>新規会員登録</h1>
<h2>メール確認</h2>

<?php if (count($errors) === 0): ?>

<p><?=$message?></p>

<p>↓このURLが記載されたメールが届きます。</p>
<a href="<?=$url?>"><?=$url?></a>

<?php elseif(count($errors) > 0): ?>

<?php
foreach($errors as $value){
	echo "<p>".$value."</p>";
}
?>

<input type="button" value="戻る" onClick="history.back()">
<!--これはJavaScriptでhistory.back()は一つ前のページに戻る-->

<?php endif; ?>

</body>
</html>