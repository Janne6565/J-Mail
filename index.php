    <html>
 <head>
  <title>J-Mail</title>
  <link rel="icon" type="image/png" href="j-mail.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
 </head>
 <style>
	 	body{
			align-items: center;
			display: flex;
			justify-content: space-around;
			flex-direction: column;
			font-family: sans-serif;
		}
		.submit{
			width:100px;
			height:50px;
			border:none;
			outline:none;
			transition: all 0.3s ease;
		}
		.show{
			display: none;
		}
		.show + label{
			padding-top:10px;
			padding-bottom:10px;
			background-color:#F0F0F0;
			width:200px;
			height:20px;
			border:none;
			outline:none;
			transition: all 0.2s ease;
		}
		.show:checked + label{
			background-color:#989898;
		}
		.submit:active{
			transition: background 0.5s ease;
			background-color:#989898;
			outline: none;
		}
		.form{
			width: 50%;
			position:relative;
			height:50px;
			overflow: hidden;
		}
		.form input{
			width:100%;
			height:100%;
			color: black;
			padding-top:15px;
			border:none;
			outline:none;
		} 
		.form .labelFor{
			position: absolute;
			bottom:0px;
			left:0%;
			width:100%;
			height: 100%;
			pointer-events: none;
			border-bottom: 1.5px solid black;
		} 
		.form label::after{
			content: "";
			position:absolute;
			height:100%;
			width:100%;
			bottom:-3px;
			left:0;
			transform: translateX(-150%);
			border-bottom:3px solid #037FFE;
			transition: transform 0.3s ease;
			overflow: hidden;
		}
		.content-name_{
			position: absolute;
			bottom:10px;
			left:0px;
			transition: all 0.3s ease;
		}
		.form input:focus + .label-name_ .content-name_ ,
		.form input:valid + .label-name_ .content-name_{
			transform: translateY(-150%);
			font-size:14px;
		}
		.form input:focus + .label-name_::after,
		.form input:valid + .label-name_::after{
			overflow: hidden;
			transform: translateX(0%);
		}
		.content-passwort_{
			position: absolute;
			bottom:10px;
			left:0px;
			transition: all 0.3s ease;
		}
		.form input:focus + .label-passwort_ .content-passwort_ ,
		.form input:valid + .label-passwort_ .content-passwort_{
			transform: translateY(-150%);
			font-size:14px;
		}
		.form input:focus + .label-passwort_::after,
		.form input:valid + .label-passwort_::after{
			overflow: hidden;
			transform: translateX(0%);
		}
		.content-e-mail{
			position: absolute;
			bottom:10px;
			left:0px;
			transition: all 0.3s ease;
		}
		.form input:focus + .label-e-mail .content-e-mail ,
		.form input:valid + .label-e-mail .content-e-mail{
			transform: translateY(-150%);
			font-size:14px;
		}
		.form input:focus + .label-e-mail::after,
		.form input:valid + .label-e-mail::after{
			overflow: hidden;
			transform: translateX(0%);
		}
		.content-name{
			position: absolute;
			bottom:10px;
			left:0px;
			transition: all 0.3s ease;
		}
		.form input:focus + .label-name .content-name ,
		.form input:valid + .label-name .content-name{
			transform: translateY(-150%);
			font-size:14px;
		}
		.form input:focus + .label-name::after,
		.form input:valid + .label-name::after{
			overflow: hidden;
			transform: translateX(0%);
		}
		.content-passwort{
			position: absolute;
			bottom:10px;
			left:0px;
			transition: all 0.3s ease;
		}
		.form input:focus + .label-passwort .content-passwort ,
		.form input:valid + .label-passwort .content-passwort{
			transform: translateY(-150%);
			font-size:14px;
		}
		.form input:focus + .label-passwort::after,
		.form input:valid + .label-passwort::after{
			overflow: hidden;
			transform: translateX(0%);
		}
		.labelShow{
			margin-top:20px;
		}
		input[type="submit"]:hover, .labelShow:hover{
			box-shadow: 0.5px 0.5px 0.5px 0.5px grey;
		}
 </style>
 <body>
 	<br>
 		<h1> Melde dich hier an:</h1>
 		<div class="form">
 	<form action="login.php" method="post">
 		
	    <input type="text" name="benutzername" required class="inputs">
	    <label for="benutzername" class="label-name_ labelFor"><span class="content-name_">Name</span></label></div><br>
	    <div class="form">
	    <input type="password" name="passwort" required class="inputs" id="passwort">
	    <label for="passwort" class="label-passwort_ labelFor" ><span class="content-passwort_" >Passwort</span></label></div> <input type="checkbox" onclick="makeVisible();"  id="show" class="show" id="show" name="show" > <label for="show" class="labelShow"><div align="center">Passwort zeigen</div></label>
	    <br><br>
	    <input type="submit" value="Login" class="submit">
	</form>

		<h1> Oder registriere dich hier:</h1>
		<div class="form">
		<form action="" method="post">
		    <input type="name" name="_name" class="inputs" required>
		    <label for="_name" class="label-name labelFor"><span class="content-name">Name</span></label>
			</div>
		   	<br><br>
		   	<div class="form">
		   	<input type="e-mail" name="_email" class="inputs" required>
		    <label for="_email" class="label-e-mail labelFor"><span class="content-e-mail">E-Mail</span></label></div><br><br>
		   	<div class="form">
		    <input type="password" name="_passwort" class="inputs" id="passwort_"required>
		    <label for="_passwort" class="label-passwort labelFor"><span class="content-passwort">Passwort</span></label></div>
		    
		    <input type="checkbox" onclick="makeVisible_();"  id="show_" class="show"> <label for="show_" class="labelShow"><div align="center">Passwort zeigen</div></label>
		    <p><input type="submit" value="Registriere dich" class="submit"></p>
		</form> 
</div>
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
			die("Fehler: ".$con->connect_error);
		}
		else{		
		}
		/*$sen = "INSERT INTO Massages (Massage, Date) values ('Hallo', '$heute')";*/
		$sql = "INSERT INTO User (Name, Password, EMail, Verified, VerifyCode) values ('$name', '$passwort', '$email', '0', '$verifyCode')";
		if($con->query($sql) === TRUE){
			mail($email,'Verifizierungscode: '.$verifyCode, $massageMail, implode("\r\n", $header));
		}
		else{
			echo"<br>Dieser Name ist bereits vergeben, bitte w$auml;hle einen neuen!";
		}
		?>	
<footer>
		<a href="http://projektejwkk.de/Zufall/impressum.html">Impressum</a>
	</footer>
 </body>
 <script>
 	function makeVisible(){		
 		var password = document.getElementById('passwort');
 		if (password.type=="password"){
 			password.type="text";
 		}
 		else{
 			password.type="password";
 		}
 	}
 	function makeVisible_(){
 		var password_ =document.getElementById('passwort_');
 		if (password_.type == "password"){
 			password_.type="text";
 		}
 		else{
 			password_.type="password";
 		}
 	}
 </script>
</html>