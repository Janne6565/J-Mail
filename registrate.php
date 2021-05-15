<!DOCTYPE html>
<html>
<head>
	<title>J-Mail</title>
	<link rel="icon" type="image/png" size="undefined" data-hid="favicon" href="j-mail.png">
</head>
<style>
</style>
<body>
	<?php
		$name=$_POST[_name];
		$passwort=password_hash($_POST[_passwort], PASSWORD_DEFAULT);
		$email=$_POST[_email];
		$verifyCode = rand(10000,99999);
		$servername = "";
		$user = "";
        $pw = "";
        $db = "";
		$con = new mysqli($servername,$user,$pw,$db);
		$massageMail = "
			<html>
	<head>
		<title>J-Mail</title>
	</head>
	<style>
		body{
			font-family: sans-serif;
		}
		.text{
			margin-bottom:40px;
			font-size: 45px;
		}
		.code{
			border: 2px solid rgb(218,216,222);
			font-size:40px;
			background-color: #FAF9FA;
		}
	</style>
	<body>
		<div class='text' align='center'>Ihr Verifizierungscode lautet: </div><div align='center'><span class='code'>".$verifyCode."</span></div>
	</body>
</html>";
		$header[] = 'MIME-Version: 1.0';
		$header[] = 'Content-type: text/html; charset=iso-8859-1';
		$header[] = 'From: J-Mail <J-Mail@J-Mail.de>';
		if ($con->connect_error){
			die("Funktioniert nicht!".$con->connect_error);
		}
		else{
			echo"Verbunden! <br>";
		}
		mail($email,'Verifizierungscode: '.$verifyCode, $massageMail, implode("\r\n", $header));
		/*$sen = "INSERT INTO Massages (Massage, Date) values ('Hallo', '$heute')";*/
		$sql = "INSERT INTO User (Name, Password, EMail, Verified, VerifyCode) values ('$name', '$passwort', '$email', '0', '$verifyCode')";
		if($con->query($sql) === TRUE){
			
		}
		else{
			echo"<br>Dieser Name ist bereits vergeben bitte w$aumlhle einen anderen! ";
		}
		/*
		if($con->query($sen) === TRUE){
			echo"Gesendet!";
		}
		else{
			echo"<br>Es gab einen Fehler! <br> Wir versuchen diesen zu beheben!";
		}*/
	?>
	<footer>
		<a href="http://projektejwkk.de/Zufall/impressum.html">Impressum</a>
	</footer>
</body>
</html>