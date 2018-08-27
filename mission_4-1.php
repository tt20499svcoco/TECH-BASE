<?php
try{
    // データベースに接続
    $dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
    $user = 'ユーザー名';
    $pass = 'パスワード';
    $pdo = new PDO($dsn,$user,$pass);

// テーブル作成(AUTO_INCREMENT:シーケンス番号自動振り分け)(NULL許可)
    $sql = 'CREATE TABLE test (
        id              BIGINT AUTO_INCREMENT,
        name            VARCHAR(10) NULL,
        comment         VARCHAR(20) NULL,
        regist_date     DATETIME    NULL,
        password        VARCHAR(10) NULL,
        PRIMARY KEY (id)
    )';
    $result = $pdo -> query($sql);  //SQL実行
}
catch (PDOException $e) {

    // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
    // ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

date_default_timezone_set('Asia/Tokyo'); // タイムゾーンをTokyoにセット

/////////////////////////送信ボタンが押されたらtrue////////////////////////////////////

if (isset($_POST['button1'])){
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $regist_date = date("Y-m-d H:i:s");
    $password1 = $_POST['pass'];
    if ($name !== '' && $comment !== '' && $password1 !== ''){   //空じゃないならtrue
        //データ挿入(行を名前を付けて)
//bindParam('A,B,C');.Aは先程のVALUESのパラメータ Bは格納する変数 Cは型を指定PARAM_STRは文字列型
        $sql = $pdo -> prepare("INSERT INTO test (
            name,comment,regist_date,password
            ) VALUES (
            :name,:comment,:regist_date,:password
            )");
        $sql -> bindParam(':name', $name, PDO::PARAM_STR);  //PARAM_STRは文字列型
        $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
        $sql -> bindParam(':regist_date', $regist_date, PDO::PARAM_STR);
        $sql -> bindParam(':password', $password1, PDO::PARAM_STR);
        $sql -> execute();  //executeは実行する。これがないとダメ prepareとセット

        $b1_true = 'ご入力ありがとうございます';
    }
    else{   //空ならtrue
        if ($name === ''){
            $name_fault = '名前を入力してください';
        }
        if ($comment === ''){
            $comment_fault = 'コメントを入力してください';
        }
        if ($password === ''){
            $password_fault = 'パスワードを入力してください';
        }
    }
}

////////////////////削除ボタンを押されたらtrue/////////////////////////////////////

elseif (isset($_POST['button2'])){
    $number = $_POST['remove'];
    $password2 = $_POST['pass2'];
    if ($number !== '' && $password2 !== ''){    //空じゃないならtrue
        $sql = $pdo -> prepare("SELECT password FROM test WHERE id = $number");
        $sql -> execute();
        foreach ($sql as $row){
        }
        if ($password2 === $row['password']){        //パスワードが一致するならtrue
            $sql = $pdo -> prepare("DELETE FROM test WHERE id = $number");
            $sql -> execute();
            $b2_true = '投稿は削除されました';
        }
        else{                                       //パスワードが一致しないならtrue
            $b2_true = '投稿番号かパスワードが違います';
        }
    }
    else{                                               //空ならtrue
        if ($number === ''){
            $b2_true = '削除番号を入力してください';
        }
        if ($password === ''){
            $password_fault = 'パスワードを入力してください';
        }
    }
}

////////////////////////編集ボタンが押されたらtrue////////////////////////////////////////

elseif (isset($_POST['button3'])){
    if (empty($_POST['revise'])){  //編集モードに移る操作
        $number = $_POST['editing'];
        $password3 = $_POST['pass3'];
        if ($number !== '' && $password3 !== ''){    //空じゃないならtrue
            $sql = $pdo -> prepare("SELECT name, comment, password FROM test WHERE id = $number");
            $sql -> execute();
            foreach($sql as $row){
            }
            if ($password3 === $row["password"]){    //パスワードが一致ならtrue
                $b3_true = '投稿'.$number.'の編集モードです';
                $edit_number = $number;
                $edit_name = $row["name"];
                $edit_comment = $row["comment"];
            }
            else{                                   //パスワードが一致しないならtrue
                $b3_true = '投稿番号かパスワードが違います';
            }
        }
        else{                                       //編集が空ならtrue
            if ($number === ''){
                $b3_true = '編集番号を入力してください';
            }
            if ($password === ''){
                $password_fault = 'パスワードを入力してください';
            }
        }
    }

    else{   //編集モード
        $number = $_POST['revise'];
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $regist_date = date("Y-m-d H:i:s");
        $sql = $pdo -> prepare("UPDATE test SET name='$name', comment='$comment', regist_date='$regist_date' WHERE id = $number");
        $sql -> execute();
        $b3_true = '投稿は編集されました';
    }
}
?>

<html lang="ja">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <form action="mission_4-1.php" method="post">
            <input type="text" name="name" placeholder="名前" value="<?php echo $edit_name;?>"><br>
            <input type="text" name="comment" placeholder="コメント" value="<?php echo $edit_comment;?>"><br>
        <?php if (empty($edit_name)):?>
                <input type="password" name="pass" placeholder="パスワード">
                <input type="submit" name="button1" value="送信"><br><br>
                <input type="text" name="remove" placeholder="削除対象番号"><br>
                <input type="password" name="pass2" placeholder="パスワード">
                <input type="submit" name="button2" value="削除"><br><br>
                <input type="text" name="editing" placeholder="編集対象番号"><br>
                <input type="password" name="pass3" placeholder="パスワード">
        <?php else:?>
                <input type="hidden" name="revise" value="<?php echo $edit_number;?>">
        <?php endif; ?>
            <input type="submit" name="button3" value="編集"><br><br>
    </form>
    </body>
</html>

<?php
try{
    //idを昇順(ASC)で中身を全て(*)検索(降順はDESE)
    $sql = 'SELECT * FROM test ORDER BY id ASC';
    $results = $pdo -> query($sql);
    echo "テーブルの内容を表示".'<br>';
    foreach ($results as $row){
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].',';
        echo $row['regist_date'].'<br>';
    }
}
catch (PDOException $e) {

    // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
    // ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}
?>

<?php
    echo "<br>";
    if ($b1_true !== '') echo $b1_true .'<br>';
    if ($b2_true !== '') echo $b2_true.'<br>';
    if ($b3_true !== '') echo $b3_true.'<br>';
    if ($name_fault !== '') echo $name_fault.'<br>';
    if ($comment_fault !== '') echo $comment_fault.'<br>';
    if ($password_fault !== '') echo $password_fault.'<br>'.'<br>';
?>