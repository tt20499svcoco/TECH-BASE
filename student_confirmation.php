<?php
///////////////////////////////生徒情報確認フォーム///////////////////////////////////////

// データベースに接続
$dsn = 'mysql:dbname=データベース名;host=localhost;charset=utf8mb4';
$user = 'ユーザー名';
$pass = 'パスワード';
$pdo = new PDO($dsn,$user,$pass);

////////////////////検索ボタンを押されたらtrue/////////////////////////////////////
if(isset($_POST['search'])){
    $number = $_POST['number'];
    if ($number !== ''){
        $sql = $pdo -> prepare("SELECT * FROM owner WHERE id = $number");
        $sql -> execute();
        foreach($sql as $row){
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
            $b3_true = '生徒番号を入力してください';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>生徒情報確認</title>
	</head>
	<body style="background: radial-gradient(#E6FFE9, #EA6264) fixed;">
		<tb style="background-color:#000000;" align = "left" valign = "top"><a href="mypage.php"><font = color="white">マイページ</font></a>&nbsp;&nbsp;<a href="list.php"><font = color="white">生徒一覧表</font></a>&nbsp;&nbsp;<a href="student.php"><font = color="white">登録削除編集</font></a>&nbsp;&nbsp;<a href="student_confirmation.php"><font = color="white">確認</font></a>&nbsp;&nbsp;<a href="login12.php"><font = color="white">ログアウト</font></a></tb><br>
		<h1>生徒の番号を入力し,検索ボタンを押してください。</h1>
		<?php echo $a ?><br>
		<br>
		<form action="student_confirmation.php" method="post">
			<input type="text" name="number" placeholder="検索対象番号"><br>
			<button type="submit" name="search" value="search">検索</button><br>
			<input type="button" value="戻る" onClick="history.back()"><br>
		郵便番号：
        〒<?php echo $e_postcode1;?>
        - <?php echo $e_postcode2;?><br><br>
        住所：
        <?php echo $e_address;?><br>
   		<br>
		TEL：
		<?php echo $e_TEL;?><br>
		<br>
		メールアドレス：
		<?php echo $e_email;?><br>
		<br>
		性別：
		<?php echo $e_personal;?><br>
		<br>
		学校名：
		<?php echo $e_school;?><br>
		<br>
		学年：
		<?php echo $e_grade;?><br>
    	<br>
		保護者氏名：
		<?php echo $e_namesin;?><br>
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
                <th><input style="background-color:#FFDDFF;" type="number" name="a11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a11;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b11;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c11;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d11;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e11;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f11;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g11;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h11;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i11" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i11;?>"></th>
            </tr>
            <tr align="center">
                <th>点数(中間)</th>
                <th><input style="background-color:#FFDDFF;" type="number" name="a12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a12;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b12;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c12;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d12;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e12;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f12;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g12;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h12;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i12" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i12;?>"></th>
            </tr>
            <tr align="center">
                <th>点数(期末)</th>
                <th><input style="background-color:#FFDDFF;" type="number" name="a13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a13;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b13;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c13;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d13;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e13;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f13;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g13;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h13;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i13" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i13;?>"></th>
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
                <th><input style="background-color:#FFDDFF;" type="number" name="a21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a21;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b21;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c21;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d21;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e21;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f21;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g21;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h21;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i21" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i21;?>"></th>
            </tr>
            <tr align="center">
                <th>点数(中間)</th>
                <th><input style="background-color:#FFDDFF;" type="number" name="a22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a22;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b22;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c22;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d22;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e22;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f22;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g22;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h22;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i22" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i22;?>"></th>
            </tr>
            <tr align="center">
                <th>点数(期末)</th>
                <th><input style="background-color:#FFDDFF;" type="number" name="a23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a23;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b23;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c23;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d23;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e23;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f23;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g23;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h23;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i23" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i23;?>"></th>
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
                <th><input style="background-color:#FFDDFF;" type="number" name="a31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a31;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b31;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c31;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d31;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e31;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f31;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g31;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h31;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i31" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i31;?>"></th>
            </tr>
            <tr align="center">
                <th>点数(中間)</th>
                <th><input style="background-color:#FFDDFF;" type="number" name="a32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a32;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b32;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c32;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d32;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e32;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f32;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g32;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h32;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i32" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i32;?>"></th>
            </tr>
            <tr align="center">
                <th>点数(期末)</th>
                <th><input style="background-color:#FFDDFF;" type="number" name="a33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_a33;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="b33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_b33;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="c33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_c33;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="d33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_d33;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="e33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_e33;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="f33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_f33;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="g33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_g33;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="h33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_h33;?>"></th>
                <th><input style="background-color:#FFDDFF;" type="number" name="i33" size="3" title="半角数字で入力して下さい。" value = "<?php echo $e_i33;?>"></th>
			</tr>
		</table>
		<br>
		<br>
		<br>
		コメント：
		<br>
		<textarea rows="10" cols="40" name="comment" ><?php echo $e_comment;?></textarea>
		<br>
		</form>
	</body>
</html>