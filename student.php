<?php
/////////////////////////生徒情報(登録)(削除)(編集)//////////////////////////////////
try{
    // データベースに接続
    $dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
    $user = 'ユーザー名';
    $pass = 'パスワード';
    $pdo = new PDO($dsn,$user,$pass);

    // テーブル作成(AUTO_INCREMENT:シーケンス番号自動振り分け)(NULL許可)
    $sql = 'CREATE TABLE owner (
    id              BIGINT AUTO_INCREMENT,
    postcode1       INT NULL,
    postcode2       INT NULL,
    address         VARCHAR(20) NULL,
    TEL             INT NULL,
    email           VARCHAR(20) NULL,
    name            VARCHAR(20) NULL,
    personal        VARCHAR(3) NULL,
    school          VARCHAR(20) NULL,
    grade           INT NULL,
    namesin         VARCHAR(20) NULL,
    a11 INT NULL,
    b11 INT NULL,
    c11 INT NULL,
    d11 INT NULL,
    e11 INT NULL,
    f11 INT NULL,
    g11 INT NULL,
    h11 INT NULL,
    i11 INT NULL,
    a12 INT NULL,
    b12 INT NULL,
    c12 INT NULL,
    d12 INT NULL,
    e12 INT NULL,
    f12 INT NULL,
    g12 INT NULL,
    h12 INT NULL,
    i12 INT NULL,
    a13 INT NULL,
    b13 INT NULL,
    c13 INT NULL,
    d13 INT NULL,
    e13 INT NULL,
    f13 INT NULL,
    g13 INT NULL,
    h13 INT NULL,
    i13 INT NULL,
    a21 INT NULL,
    b21 INT NULL,
    c21 INT NULL,
    d21 INT NULL,
    e21 INT NULL,
    f21 INT NULL,
    g21 INT NULL,
    h21 INT NULL,
    i21 INT NULL,
    a22 INT NULL,
    b22 INT NULL,
    c22 INT NULL,
    d22 INT NULL,
    e22 INT NULL,
    f22 INT NULL,
    g22 INT NULL,
    h22 INT NULL,
    i22 INT NULL,
    a23 INT NULL,
    b23 INT NULL,
    c23 INT NULL,
    d23 INT NULL,
    e23 INT NULL,
    f23 INT NULL,
    g23 INT NULL,
    h23 INT NULL,
    i23 INT NULL,
    a31 INT NULL,
    b31 INT NULL,
    c31 INT NULL,
    d31 INT NULL,
    e31 INT NULL,
    f31 INT NULL,
    g31 INT NULL,
    h31 INT NULL,
    i31 INT NULL,
    a32 INT NULL,
    b32 INT NULL,
    c32 INT NULL,
    d32 INT NULL,
    e32 INT NULL,
    f32 INT NULL,
    g32 INT NULL,
    h32 INT NULL,
    i32 INT NULL,
    a33 INT NULL,
    b33 INT NULL,
    c33 INT NULL,
    d33 INT NULL,
    e33 INT NULL,
    f33 INT NULL,
    g33 INT NULL,
    h33 INT NULL,
    i33 INT NULL,
    comment VARCHAR(100) NULL,
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
//変数の用意
        $postcode1 = $_POST['postcode1'];
        $postcode2 = $_POST['postcode2'];
        $address = $_POST['address'];
        $TEL = $_POST['TEL'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $personal = $_POST['personal'];
        $school = $_POST['school'];
        $grade = $_POST['grade'];
        $namesin = $_POST['namesin'];
        $a11 = $_POST['a11'];
        $b11 = $_POST['b11'];
        $c11 = $_POST['c11'];
        $d11 = $_POST['d11'];
        $e11 = $_POST['e11'];
        $f11 = $_POST['f11'];
        $g11 = $_POST['g11'];
        $h11 = $_POST['h11'];
        $i11 = $_POST['i11'];
        $a12 = $_POST['a12'];
        $b12 = $_POST['b12'];
        $c12 = $_POST['c12'];
        $d12 = $_POST['d12'];
        $e12 = $_POST['e12'];
        $f12 = $_POST['f12'];
        $g12 = $_POST['g12'];
        $h12 = $_POST['h12'];
        $i12 = $_POST['i12'];
        $a13 = $_POST['a13'];
        $b13 = $_POST['b13'];
        $c13 = $_POST['c13'];
        $d13 = $_POST['d13'];
        $e13 = $_POST['e13'];
        $f13 = $_POST['f13'];
        $g13 = $_POST['g13'];
        $h13 = $_POST['h13'];
        $i13 = $_POST['i13'];
        $a21 = $_POST['a21'];
        $b21 = $_POST['b21'];
        $c21 = $_POST['c21'];
        $d21 = $_POST['d21'];
        $e21 = $_POST['e21'];
        $f21 = $_POST['f21'];
        $g21 = $_POST['g21'];
        $h21 = $_POST['h21'];
        $i21 = $_POST['i21'];
        $a22 = $_POST['a22'];
        $b22 = $_POST['b22'];
        $c22 = $_POST['c22'];
        $d22 = $_POST['d22'];
        $e22 = $_POST['e22'];
        $f22 = $_POST['f22'];
        $g22 = $_POST['g22'];
        $h22 = $_POST['h22'];
        $i22 = $_POST['i22'];
        $a23 = $_POST['a23'];
        $b23 = $_POST['b23'];
        $c23 = $_POST['c23'];
        $d23 = $_POST['d23'];
        $e23 = $_POST['e23'];
        $f23 = $_POST['f23'];
        $g23 = $_POST['g23'];
        $h23 = $_POST['h23'];
        $i23 = $_POST['i23'];
        $a31 = $_POST['a31'];
        $b31 = $_POST['b31'];
        $c31 = $_POST['c31'];
        $d31 = $_POST['d31'];
        $e31 = $_POST['e31'];
        $f31 = $_POST['f31'];
        $g31 = $_POST['g31'];
        $h31 = $_POST['h31'];
        $i31 = $_POST['i31'];
        $a32 = $_POST['a32'];
        $b32 = $_POST['b32'];
        $c32 = $_POST['c32'];
        $d32 = $_POST['d32'];
        $e32 = $_POST['e32'];
        $f32 = $_POST['f32'];
        $g32 = $_POST['g32'];
        $h32 = $_POST['h32'];
        $i32 = $_POST['i32'];
        $a33 = $_POST['a33'];
        $b33 = $_POST['b33'];
        $c33 = $_POST['c33'];
        $d33 = $_POST['d33'];
        $e33 = $_POST['e33'];
        $f33 = $_POST['f33'];
        $g33 = $_POST['g33'];
        $h33 = $_POST['h33'];
        $i33 = $_POST['i33'];
        $comment = $_POST['comment'];
    //}
//}
////////////////////登録ボタンが押されたら////////////////////////////////////////////
if (isset($_POST["button1"])){
    $sql = $pdo -> prepare("INSERT INTO owner (postcode1,postcode2,address,TEL,email,name,personal,school,grade,namesin,a11,b11,c11,d11,e11,f11,g11,h11,i11,a12,b12,c12,d12,e12,f12,g12,h12,i12,a13,b13,c13,d13,e13,f13,g13,h13,i13,a21,b21,c21,d21,e21,f21,g21,h21,i21,a22,b22,c22,d22,e22,f22,g22,h22,i22,a23,b23,c23,d23,e23,f23,g23,h23,i23,a31,b31,c31,d31,e31,f31,g31,h31,i31,a32,b32,c32,d32,e32,f32,g32,h32,i32,a33,b33,c33,d33,e33,f33,g33,h33,i33,comment
	) VALUES (
	:postcode1,:postcode2,:address,:TEL,:email,:name,:personal,:school,:grade,:namesin,:a11,:b11,:c11,:d11,:e11,:f11,:g11,:h11,:i11,:a12,:b12,:c12,:d12,:e12,:f12,:g12,:h12,:i12,:a13,:b13,:c13,:d13,:e13,:f13,:g13,:h13,:i13,:a21,:b21,:c21,:d21,:e21,:f21,:g21,:h21,:i21,:a22,:b22,:c22,:d22,:e22,:f22,:g22,:h22,:i22,:a23,:b23,:c23,:d23,:e23,:f23,:g23,:h23,:i23,:a31,:b31,:c31,:d31,:e31,:f31,:g31,:h31,:i31,:a32,:b32,:c32,:d32,:e32,:f32,:g32,:h32,:i32,:a33,:b33,:c33,:d33,:e33,:f33,:g33,:h33,:i33,:comment
	)");
	$sql -> bindValue(':postcode1', $postcode1, PDO::PARAM_STR);
    $sql -> bindValue(':postcode2', $postcode2, PDO::PARAM_STR);
    $sql -> bindValue(':address', $address, PDO::PARAM_STR);
   	$sql -> bindValue(':TEL', $TEL, PDO::PARAM_STR);
   	$sql -> bindValue(':email', $email, PDO::PARAM_STR);
   	$sql -> bindValue(':name', $name, PDO::PARAM_STR);
   	$sql -> bindValue(':personal', $personal, PDO::PARAM_STR);
    $sql -> bindValue(':school', $school, PDO::PARAM_STR);
    $sql -> bindValue(':grade', $grade, PDO::PARAM_STR);
    $sql -> bindValue(':namesin', $namesin, PDO::PARAM_STR);
    $sql -> bindValue(':a11', $a11,PDO::PARAM_STR);
    $sql -> bindValue(':b11', $b11,PDO::PARAM_STR);
    $sql -> bindValue(':c11', $c11,PDO::PARAM_STR);
    $sql -> bindValue(':d11', $d11,PDO::PARAM_STR);
    $sql -> bindValue(':e11', $e11,PDO::PARAM_STR);
    $sql -> bindValue(':f11', $f11,PDO::PARAM_STR);
    $sql -> bindValue(':g11', $g11,PDO::PARAM_STR);
   	$sql -> bindValue(':h11', $h11,PDO::PARAM_STR);
    $sql -> bindValue(':i11', $i11,PDO::PARAM_STR);
    $sql -> bindValue(':a12', $a12,PDO::PARAM_STR);
    $sql -> bindValue(':b12', $b12,PDO::PARAM_STR);
    $sql -> bindValue(':c12', $c12,PDO::PARAM_STR);
   	$sql -> bindValue(':d12', $d12,PDO::PARAM_STR);
    $sql -> bindValue(':e12', $e12,PDO::PARAM_STR);
    $sql -> bindValue(':f12', $f12,PDO::PARAM_STR);
    $sql -> bindValue(':g12', $g12,PDO::PARAM_STR);
    $sql -> bindValue(':h12', $h12,PDO::PARAM_STR);
    $sql -> bindValue(':i12', $i12,PDO::PARAM_STR);
    $sql -> bindValue(':a13', $a13,PDO::PARAM_STR);
    $sql -> bindValue(':b13', $b13,PDO::PARAM_STR);
    $sql -> bindValue(':c13', $c13,PDO::PARAM_STR);
    $sql -> bindValue(':d13', $d13,PDO::PARAM_STR);
    $sql -> bindValue(':e13', $e13,PDO::PARAM_STR);
    $sql -> bindValue(':f13', $f13,PDO::PARAM_STR);
    $sql -> bindValue(':g13', $g13,PDO::PARAM_STR);
    $sql -> bindValue(':h13', $h13,PDO::PARAM_STR);
    $sql -> bindValue(':i13', $i13,PDO::PARAM_STR);
    $sql -> bindValue(':a21', $a21,PDO::PARAM_STR);
    $sql -> bindValue(':b21', $b21,PDO::PARAM_STR);
    $sql -> bindValue(':c21', $c21,PDO::PARAM_STR);
    $sql -> bindValue(':d21', $d21,PDO::PARAM_STR);
    $sql -> bindValue(':e21', $e21,PDO::PARAM_STR);
    $sql -> bindValue(':f21', $f21,PDO::PARAM_STR);
    $sql -> bindValue(':g21', $g21,PDO::PARAM_STR);
    $sql -> bindValue(':h21', $h21,PDO::PARAM_STR);
    $sql -> bindValue(':i21', $i21,PDO::PARAM_STR);
    $sql -> bindValue(':a22', $a22,PDO::PARAM_STR);
    $sql -> bindValue(':b22', $b22,PDO::PARAM_STR);
    $sql -> bindValue(':c22', $c22,PDO::PARAM_STR);
    $sql -> bindValue(':d22', $d22,PDO::PARAM_STR);
    $sql -> bindValue(':e22', $e22,PDO::PARAM_STR);
    $sql -> bindValue(':f22', $f22,PDO::PARAM_STR);
    $sql -> bindValue(':g22', $g22,PDO::PARAM_STR);
    $sql -> bindValue(':h22', $h22,PDO::PARAM_STR);
    $sql -> bindValue(':i22', $i22,PDO::PARAM_STR);
    $sql -> bindValue(':a23', $a23,PDO::PARAM_STR);
    $sql -> bindValue(':b23', $b23,PDO::PARAM_STR);
    $sql -> bindValue(':c23', $c23,PDO::PARAM_STR);
    $sql -> bindValue(':d23', $d23,PDO::PARAM_STR);
    $sql -> bindValue(':e23', $e23,PDO::PARAM_STR);
    $sql -> bindValue(':f23', $f23,PDO::PARAM_STR);
    $sql -> bindValue(':g23', $g23,PDO::PARAM_STR);
    $sql -> bindValue(':h23', $h23,PDO::PARAM_STR);
    $sql -> bindValue(':i23', $i23,PDO::PARAM_STR);
    $sql -> bindValue(':a31', $a31,PDO::PARAM_STR);
    $sql -> bindValue(':b31', $b31,PDO::PARAM_STR);
    $sql -> bindValue(':c31', $c31,PDO::PARAM_STR);
    $sql -> bindValue(':d31', $d31,PDO::PARAM_STR);
    $sql -> bindValue(':e31', $e31,PDO::PARAM_STR);
    $sql -> bindValue(':f31', $f31,PDO::PARAM_STR);
    $sql -> bindValue(':g31', $g31,PDO::PARAM_STR);
    $sql -> bindValue(':h31', $h31,PDO::PARAM_STR);
    $sql -> bindValue(':i31', $i31,PDO::PARAM_STR);
    $sql -> bindValue(':a32', $a32,PDO::PARAM_STR);
    $sql -> bindValue(':b32', $b32,PDO::PARAM_STR);
    $sql -> bindValue(':c32', $c32,PDO::PARAM_STR);
    $sql -> bindValue(':d32', $d32,PDO::PARAM_STR);
    $sql -> bindValue(':e32', $e32,PDO::PARAM_STR);
    $sql -> bindValue(':f32', $f32,PDO::PARAM_STR);
    $sql -> bindValue(':g32', $g32,PDO::PARAM_STR);
    $sql -> bindValue(':h32', $h32,PDO::PARAM_STR);
    $sql -> bindValue(':i32', $i32,PDO::PARAM_STR);
    $sql -> bindValue(':a33', $a33,PDO::PARAM_STR);
    $sql -> bindValue(':b33', $b33,PDO::PARAM_STR);
    $sql -> bindValue(':c33', $c33,PDO::PARAM_STR);
    $sql -> bindValue(':d33', $d33,PDO::PARAM_STR);
    $sql -> bindValue(':e33', $e33,PDO::PARAM_STR);
    $sql -> bindValue(':f33', $f33,PDO::PARAM_STR);
    $sql -> bindValue(':g33', $g33,PDO::PARAM_STR);
    $sql -> bindValue(':h33', $h33,PDO::PARAM_STR);
    $sql -> bindValue(':i33', $i33,PDO::PARAM_STR);
    $sql -> bindValue(':comment', $comment,PDO::PARAM_STR);
    $sql -> execute();

    $b1_true = 'ご入力ありがとうございます';
}

////////////////////削除ボタンを押されたら//////////////////////////////////////////////
elseif (isset($_POST['button2'])){
    $number = $_POST['remove'];
    if ($number !== ''){    //空じゃないならtrue
    	$sql = $pdo -> prepare("DELETE FROM owner WHERE id = $number");
        $sql -> execute();
    	$b2_true = '投稿は削除されました';
	}
	else{
            $b2_true = '削除番号を入力してください';
    }
}

////////////////////////編集ボタンが押されたら///////////////////////////////////////////
if (empty($_POST['revise'])){  //編集モードに移る操作
    $number = $_POST['editing'];
    if ($number !== ''){
        $sql = $pdo -> prepare("SELECT * FROM owner WHERE id = $number");
        $sql -> execute();
        //$b3_true = '投稿'.$number.'の編集モードです';
        $edit_number = $number;
        foreach($sql as $row){
            $b3_true = '投稿'.$number.'の編集モードです';
            $e_postcode1 = $row["postcode1"];
            $e_postcode2 = $row["postcode2"];
            $e_address = $row["address"];
            $e_TEL = $row["TEL"];
            $e_email = $row["email"];
            $e_name = $row["name"];
            $e_personal = $row["personal"];
            $e_school = $row["school"];
            $e_grade = $row["grade"];
            $e_namesin = $row["namesin"];
            $e_a11 = $row["a11"];
            $e_b11 = $row["b11"];
            $e_c11 = $row["c11"];
            $e_d11 = $row["d11"];
            $e_e11 = $row["e11"];
            $e_f11 = $row["f11"];
            $e_g11 = $row["g11"];
            $e_h11 = $row["h11"];
            $e_i11 = $row["i11"];
            $e_a12 = $row["a12"];
            $e_b12 = $row["b12"];
            $e_c12 = $row["c12"];
            $e_d12 = $row["d12"];
            $e_e12 = $row["e12"];
            $e_f12 = $row["f12"];
            $e_g12 = $row["g12"];
            $e_h12 = $row["h12"];
            $e_i12 = $row["i12"];
            $e_a13 = $row["a13"];
            $e_b13 = $row["b13"];
            $e_c13 = $row["c13"];
            $e_d13 = $row["d13"];
            $e_e13 = $row["e13"];
            $e_f13 = $row["f13"];
            $e_g13 = $row["g13"];
            $e_h13 = $row["h13"];
            $e_i13 = $row["i13"];
            $e_a21 = $row["a21"];
            $e_b21 = $row["b21"];
            $e_c21 = $row["c21"];
            $e_d21 = $row["d21"];
            $e_e21 = $row["e21"];
            $e_f21 = $row["f21"];
            $e_g21 = $row["g21"];
            $e_h21 = $row["h21"];
            $e_i21 = $row["i21"];
            $e_a22 = $row["a22"];
            $e_b22 = $row["b22"];
            $e_c22 = $row["c22"];
            $e_d22 = $row["d22"];
            $e_e22 = $row["e22"];
            $e_f22 = $row["f22"];
            $e_g22 = $row["g22"];
            $e_h22 = $row["h22"];
            $e_i22 = $row["i22"];
            $e_a23 = $row["a23"];
            $e_b23 = $row["b23"];
            $e_c23 = $row["c23"];
            $e_d23 = $row["d23"];
            $e_e23 = $row["e23"];
            $e_f23 = $row["f23"];
            $e_g23 = $row["g23"];
            $e_h23 = $row["h23"];
            $e_i23 = $row["i23"];
            $e_a31 = $row["a31"];
            $e_b31 = $row["b31"];
            $e_c31 = $row["c31"];
            $e_d31 = $row["d31"];
            $e_e31 = $row["e31"];
            $e_f31 = $row["f31"];
            $e_g31 = $row["g31"];
            $e_h31 = $row["h31"];
            $e_i31 = $row["i31"];
            $e_a32 = $row["a32"];
            $e_b32 = $row["b32"];
            $e_c32 = $row["c32"];
            $e_d32 = $row["d32"];
            $e_e32 = $row["e32"];
            $e_f32 = $row["f32"];
            $e_g32 = $row["g32"];
            $e_h32 = $row["h32"];
            $e_i32 = $row["i32"];
            $e_a33 = $row["a33"];
            $e_b33 = $row["b33"];
            $e_c33 = $row["c33"];
            $e_d33 = $row["d33"];
            $e_e33 = $row["e33"];
            $e_f33 = $row["f33"];
            $e_g33 = $row["g33"];
            $e_h33 = $row["h33"];
            $e_i33 = $row["i33"];
            $e_comment = $row['comment'];
        }
        if($number === '') {                                       //編集が空ならtrue
            $b3_true = '編集番号を入力してください';
        }
    }
}
////////////////////////編集モード////////////////////////////////////////////////////////
else{
    $number = $_POST['revise'];
    $sql = $pdo -> prepare("UPDATE owner SET postcode1 = '$postcode1',postcode2 = '$postcode2',address = '$address',TEL = '$TEL',email = '$email',name = '$name',personal = '$personal',school = '$school',grade = '$grade',namesin = '$namesin',a11 = '$a11',b11 = '$b11',c11 = '$c11',d11 = '$d11',e11 = '$e11',f11 = '$f11',g11 = '$g11',h11 = '$h11',i11 = '$i11',a12 = '$a12',b12 = '$b12',c12 = '$c12',d12 = '$d12',e12 = '$e12',f12 = '$f12',g12 = '$g12',h12 = '$h12',i12 = '$i12',a13 = '$a13',b13 = '$b13',c13 = '$c13',d13 = '$d13',e13 = '$e13',f13 = '$f13',g13 = '$g13',h13 = '$h13',i13 = '$i13',a21 = '$a21',b21 = '$b21',c21 = '$c21',d21 = '$d21',e21 = '$e21',f21 = '$f21',g21 = '$g21',h21 = '$h21',i21 = '$i21',a22 = '$a22',b22 = '$b22',c22 = '$c22',d22 = '$d22',e22 = '$e22',f22 = '$f22',g22 = '$g22',h22 = '$h22',i22 = '$i22',a23 = '$a23',b23 = '$b23',c23 = '$c23',d23 = '$d23',e23 = '$e23',f23 = '$f23',g23 = '$g23',h23 = '$h23',i23 = '$i23',a31 = '$a31',b31 = '$b31',c31 = '$c31',d31 = '$d31',e31 = '$e31',f31 = '$f31',g31 = '$g31',h31 = '$h31',i31 = '$i31',a32 = '$a32',b32 = '$b32',c32 = '$c32',d32 = '$d32',e32 = '$e32',f32 = '$f32',g32 = '$g32',h32 = '$h32',i32 = '$i32',a33 = '$a33',b33 = '$b33',c33 = '$c33',d33 = '$d33',e33 = '$e33',f33 = '$f33',g33 = '$g33',h33 = '$h33',i33 = '$i33', comment = '$comment' WHERE id = $number");
        $sql -> execute();
        $b3_true = '投稿は編集されました';
    }
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<script type="text/javascript">
            $(window).ready( function() {
                $('#postcode1').jpostal({
                    postcode : [
                        '#postcode1',
                        '#postcode2'
                    ],
                    address : {
                        '#address'  : '%3%4%5'
                    }
                });
            });
        </script>
		<title>生徒情報</title>
	</head>
	<body style="background: radial-gradient(#F2B9A1, #EA6264) fixed;">
        <tb style="background-color:#000000;" align = "left" valign = "top"><a href="mypage.php"><font = color="white">マイページ</font></a>&nbsp;&nbsp;<a href="list.php"><font = color="white">生徒一覧表</font></a>&nbsp;&nbsp;<a href="student.php"><font = color="white">登録削除編集</font></a>&nbsp;&nbsp;<a href="student_confirmation.php"><font = color="white">確認</font></a>&nbsp;&nbsp;<a href="login12.php"><font = color="white">ログアウト</font></a></tb><br>
		<h1>生徒情報入力</h1>
		<?php echo "生徒情報を入力し、登録ボタンを押して下さい。"; ?>
        <br>
        <?php echo "削除、編集する際は生徒番号を入力し、削除、編集ボタンを押してください"; ?>
		<br><br>
		<form action="student.php" method="post">
		郵便番号：
        〒<input type="text" id="postcode1" name="postcode1" maxlength="3" value="<?php echo $e_postcode1;?>">
        - <input type="text" id="postcode2" name="postcode2" maxlength="4" value="<?php echo $e_postcode2;?>"><br>
        住所：
        <input type="text" id="address" name="address" value="<?php echo $e_address;?>"><br>
   		<br>
		TEL：
		<input type="tel" name="TEL" value="<?php echo $e_TEL;?>"><br>
		<br>
		メールアドレス：
		<input type="email" name="email" value="<?php echo $e_email;?>"><br>
		<br>
		生徒名：
		<input type="text" name="name" title = "例：長野 遼太郎" value="<?php echo $e_name;?>"><br>
		<br>
		性別：
		<input type="radio" name="personal" value="男">男
		<input type="radio" name="personal" value="女">女<br>
		<br>
		学校名：
		<input type="text" name="school" value="<?php echo $e_school;?>"><br>
		<br>
		学年：
		<input type="number" name= "grade" value="<?php echo $e_grade;?>">
    	<br>
        <br>
		保護者氏名：
		<input type="text" name="namesin" value="<?php echo $e_namesin;?>"><br>
		<br>
		<br>
		<br>
		成績：
		<br>
		<br>
		1学期：
		<br>
		<table border="1">
			<tr align="center">
				<th>\</th>
				<th>英語</th>
				<th>数学</th>
				<th>国語</th>
				<th>理科</th>
				<th>社会</th>
				<th>音楽</th>
				<th>美術</th>
				<th>体育</th>
				<th>技・家</th>
			</tr>
			<tr align="center">
				<th>内申</th>
				<th><input type="number" name="a11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a11;?>"></th>
				<th><input type="number" name="b11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b11;?>"></th>
				<th><input type="number" name="c11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c11;?>"></th>
				<th><input type="number" name="d11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d11;?>"></th>
				<th><input type="number" name="e11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e11;?>"></th>
				<th><input type="number" name="f11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f11;?>"></th>
				<th><input type="number" name="g11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g11;?>"></th>
				<th><input type="number" name="h11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h11;?>"></th>
				<th><input type="number" name="i11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i11;?>"></th>
			</tr>
			<tr align="center">
				<th>点数(中間)</th>
				<th><input type="number" name="a12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a12;?>"></th>
				<th><input type="number" name="b12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b12;?>"></th>
				<th><input type="number" name="c12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c12;?>"></th>
				<th><input type="number" name="d12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d12;?>"></th>
				<th><input type="number" name="e12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e12;?>"></th>
				<th><input type="number" name="f12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f12;?>"></th>
				<th><input type="number" name="g12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g12;?>"></th>
				<th><input type="number" name="h12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h12;?>"></th>
				<th><input type="number" name="i12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i12;?>"></th>
			</tr>
			<tr align="center">
				<th>点数(期末)</th>
				<th><input type="number" name="a13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a13;?>"></th>
				<th><input type="number" name="b13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b13;?>"></th>
				<th><input type="number" name="c13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c13;?>"></th>
				<th><input type="number" name="d13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d13;?>"></th>
				<th><input type="number" name="e13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e13;?>"></th>
				<th><input type="number" name="f13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f13;?>"></th>
				<th><input type="number" name="g13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g13;?>"></th>
				<th><input type="number" name="h13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h13;?>"></th>
				<th><input type="number" name="i13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i13;?>"></th>
			</tr>
		</table>
		<br>
		<br>
		2学期：
		<br>
		<table border="1">
			<tr align="center">
				<th>\</th>
				<th>英語</th>
				<th>数学</th>
				<th>国語</th>
				<th>理科</th>
				<th>社会</th>
				<th>音楽</th>
				<th>美術</th>
				<th>体育</th>
				<th>技・家</th>
			</tr>
			<tr align="center">
				<th>内申</th>
				<th><input type="number" name="a21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a21;?>"></th>
				<th><input type="number" name="b21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b21;?>"></th>
				<th><input type="number" name="c21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c21;?>"></th>
				<th><input type="number" name="d21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d21;?>"></th>
				<th><input type="number" name="e21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e21;?>"></th>
				<th><input type="number" name="f21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f21;?>"></th>
				<th><input type="number" name="g21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g21;?>"></th>
				<th><input type="number" name="h21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h21;?>"></th>
				<th><input type="number" name="i21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i21;?>"></th>
			</tr>
			<tr align="center">
				<th>点数(中間)</th>
				<th><input type="number" name="a22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a22;?>"></th>
				<th><input type="number" name="b22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b22;?>"></th>
				<th><input type="number" name="c22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c22;?>"></th>
				<th><input type="number" name="d22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d22;?>"></th>
				<th><input type="number" name="e22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e22;?>"></th>
				<th><input type="number" name="f22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f22;?>"></th>
				<th><input type="number" name="g22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g22;?>"></th>
				<th><input type="number" name="h22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h22;?>"></th>
				<th><input type="number" name="i22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i22;?>"></th>
			</tr>
			<tr align="center">
				<th>点数(期末)</th>
				<th><input type="number" name="a23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a23;?>"></th>
				<th><input type="number" name="b23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b23;?>"></th>
				<th><input type="number" name="c23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c23;?>"></th>
				<th><input type="number" name="d23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d23;?>"></th>
				<th><input type="number" name="e23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e23;?>"></th>
				<th><input type="number" name="f23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f23;?>"></th>
				<th><input type="number" name="g23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g23;?>"></th>
				<th><input type="number" name="h23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h23;?>"></th>
				<th><input type="number" name="i23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i23;?>"></th>
			</tr>
		</table>
		<br>
		<br>
		3学期：
		<br>
		<table border="1">
			<tr align="center">
				<th>\</th>
				<th>英語</th>
				<th>数学</th>
				<th>国語</th>
				<th>理科</th>
				<th>社会</th>
				<th>音楽</th>
				<th>美術</th>
				<th>体育</th>
				<th>技・家</th>
			</tr>
			<tr align="center">
				<th>内申</th>
				<th><input type="number" name="a31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a31;?>"></th>
				<th><input type="number" name="b31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b31;?>"></th>
				<th><input type="number" name="c31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c31;?>"></th>
				<th><input type="number" name="d31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d31;?>"></th>
				<th><input type="number" name="e31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e31;?>"></th>
				<th><input type="number" name="f31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f31;?>"></th>
				<th><input type="number" name="g31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g31;?>"></th>
				<th><input type="number" name="h31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h31;?>"></th>
				<th><input type="number" name="i31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i31;?>"></th>
			</tr>
			<tr align="center">
				<th>点数(中間)</th>
				<th><input type="number" name="a32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a32;?>"></th>
				<th><input type="number" name="b32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b32;?>"></th>
				<th><input type="number" name="c32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c32;?>"></th>
				<th><input type="number" name="d32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d32;?>"></th>
				<th><input type="number" name="e32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e32;?>"></th>
				<th><input type="number" name="f32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f32;?>"></th>
				<th><input type="number" name="g32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g32;?>"></th>
				<th><input type="number" name="h32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h32;?>"></th>
				<th><input type="number" name="i32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i32;?>"></th>
			</tr>
			<tr align="center">
				<th>点数(期末)</th>
				<th><input type="number" name="a33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a33;?>"></th>
				<th><input type="number" name="b33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b33;?>"></th>
				<th><input type="number" name="c33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c33;?>"></th>
				<th><input type="number" name="d33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d33;?>"></th>
				<th><input type="number" name="e33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e33;?>"></th>
				<th><input type="number" name="f33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f33;?>"></th>
				<th><input type="number" name="g33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g33;?>"></th>
				<th><input type="number" name="h33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h33;?>"></th>
				<th><input type="number" name="i33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i33;?>"></th>
			</tr>
		</table>
		<br>
		<br>
		<br>
		コメント：
		<br>
		<textarea rows="10" cols="40" name="comment" ><?php echo $e_comment;?></textarea>
		<br>
		<?php if (empty($e_name)):?>
                <input type="submit" name="button1" value="登録"><br><br>
                <input type="text" name="remove" placeholder="削除対象番号"><br>
                <input type="submit" name="button2" value="削除"><br><br>
                <input type="text" name="editing" placeholder="編集対象番号"><br>
        <?php else:?>
                <input type="hidden" name="revise" value="<?php echo $edit_number;?>">
        <?php endif; ?>
            <input type="submit" name="button3" value="編集"><br><br>
		<input type="button" value="戻る" onClick="history.back()"><br>
		</form>
	</body>
	</html>
<?php
    echo "<br>";
    if ($b1_true !== '') echo $b1_true .'<br>';
    if ($b2_true !== '') echo $b2_true.'<br>';
    if ($b3_true !== '') echo $b3_true.'<br>';
?>