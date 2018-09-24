<!DOCTYPE html>
<!--生徒情報一覧表（生徒番号と生徒名）////////////////////////////////////////-->
<html>
<head>
<title>生徒一覧表</title>
<meta charset="utf-8">
<br><br></head>
<body style="background: radial-gradient(#F2B9A1, #EA6264) fixed;">
        <tb style="background-color:#000000;" align = "left" valign = "top"><a href="mypage.php"><font = color="white">マイページ</font></a>&nbsp;&nbsp;<a href="list.php"><font = color="white">生徒一覧表</font></a>&nbsp;&nbsp;<a href="student.php"><font = color="white">登録削除編集</font></a>&nbsp;&nbsp;<a href="student_confirmation.php"><font = color="white">確認</font></a>&nbsp;&nbsp;<a href="login12.php"><font = color="white">ログアウト</font></a></tb><br>
<h1>生徒一覧表(五十音順)</h1>
<font = color="red" size ="6">登録、削除、編集した値を表示するなら、F5を押してページを更新させて下さい</font>
<br><br>
</body>
</html>

<?php
header('Content-Type: text/html; charset=UTF-8');
try{
    // データベースに接続
    $dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
    $user = 'ユーザー名';
    $pass = 'パスワード';
    $pdo = new PDO($dsn,$user,$pass);
    //idを昇順(ASC)で中身を全て(*)検索(降順はDESE)
    $sql = 'SELECT id, name  FROM owner ORDER BY name';
    $results = $pdo -> query($sql);
    foreach ($results as $row){
        echo $row['id'].',';
        echo $row['name'].'<br>';
    }
}
catch (PDOException $e) {

    // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
    // ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}
?>