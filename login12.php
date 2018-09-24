<?php
/////////////////////////ログイン画面////////////////////////////////////////////////////
    // データベースに接続
    $dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
    $user = 'ユーザー名';
    $pass = 'パスワード';
    $pdo = new PDO($dsn,$user,$pass);

if (isset($_POST["login"])) {
	$pass = $_POST['logpass'];
	$mail =	$_POST['mail'];
	if(!empty($pass) && !empty($mail)){
		$sql = 'SELECT * FROM member WHERE mail = :mail';
		$stmt = $pdo -> prepare($sql);
		$stmt -> bindValue(":mail", $mail, PDO::PARAM_STR);
		$stmt -> execute();
		$password = crypt($pass, PASSWORD_DEFAULT);
		foreach ($stmt as $row){
		}
    	if($row['password'] == $password){
    		header("Location: mypage.php");
    		exit();
    	}
    	else{
    		$mail_error = "メールアドレスかパスワードが違います。";
    	}
    }
    else{
    	if(empty($mail)){
    		$mail_error = "メールアドレスを入力して下さい";
    	}
    	elseif(empty($pass)){
    		$mail_error = "パスワードを入力して下さい";
    	}
    }
}
?>
<!DOCTYPE html>
<html lang="ja" style="background: radial-gradient(#F2B9A1, #EA6264) fixed;">
	<head>
		<meta charset="UTF-8">
		<title>ログイン画面</title>
		<link rel="stylesheet" href="login.css" type="text/css">
	</head>
<body align = "center" valign = "middle">
<div class="login">
  <div class="heading">
    <h2>Sign in</h2>
    <form action="login12.php" method="post">
      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" name = "mail" placeholder="Email">
          </div>
        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" name="logpass" placeholder="Password">
        </div>

        <button type="submit" class="float" name="login">Login</button>
       </form>
 		</div>
 </div>
<?php echo $mail_error."<br>" ?>
<a href="registration_mail_form.php">新規登録&nbsp;&nbsp;</a>
	</body>
</html>