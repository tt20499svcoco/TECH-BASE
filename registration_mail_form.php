<?php
///////////////////仮登録（メール登録フォーム）///////////////////////////////////////////////
//セッション作成。もしくは、GET,POSTにより渡されたセッションIDに基づき現在のセッションを復帰する。返り値はTRUE
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策
//攻撃者があるウェブページを作り、そこに訪れた第三者に対して罠をしかけたリンクを踏ませ、知らないうちに別のサイトへ書き込みを行わせるといった攻撃法です。つまり、サイトをまたがって（クロス・サイト）、偽物（forgery）のリクエストを送るという手法
//詳しくはhttps://noumenon-th.net/programming/2016/02/03/csrf/
$u = rand(0,32);
$_SESSION['token'] = base64_encode($u);
//$_SESSION:現在のセッションに登録されている値の変数
//64進数
//疑似乱数のバイト文字列

$token = $_SESSION['token'];

//クリックジャッキング対策
//透明表示機能などによって見えないページを準備し、そのページ上にあるボタンをユーザにクリックさせることによって、思わぬ損害を与えるような攻撃。詳しくはhttps://noumenon-th.net/programming/2016/02/20/clickjacking/
header('X-FRAME-OPTIONS: SAMEORIGIN');
//ブラウザーがページを <frame>, <iframe>, <object> の中に表示することを許可するかどうかを示すために使用されます。
//SAMEORIGIN側を有効にすると同一ドメイン以外ではiframeには表示されなくなる。

?>

<!DOCTYPE html>
<html>
<head>
<title>メール登録画面</title>
<meta charset="utf-8">
</head>
<body style="background-color:#B1F9D0;">
<h1>新規会員登録</h1>
<h2>メール登録</h2>
<?php echo "メールアドレスを入力し、送信ボタンを押してください" ?><br><br>
<form action="registration_mail_check.php" method="post">
<p>メールアドレス：<input type="text" name="mail" size="50"></p>
<input type="hidden" name="token" value="<?=$token?>">
<!--トークンをフォームのhiddenに打ち込む。＜?=は＜php echoのショートタグ-->
<input type="submit" value="送信">
</form>
</body>
</html>