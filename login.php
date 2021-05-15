<!DOCTYPE html>
<html>
<head>
	<title>J-Mail</title>
	<link rel="icon" type="image/png" size="undefined" data-hid="favicon" href="j-mail.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	body{
		padding:0;
		font-family:block;
		margin-top:0px;
		background-color: white;
	}
	h1{
		top:10px;
		border:none;
		padding:10px;
		margin: 0;	
		position: absolute;
	}
	form{
		margin-left:200px;
		font-size:17px;
		position:absolute;
	}
	.input{
		border:none;
		border-bottom: 1px #989898 solid;
		outline:none;
		transition: all 1s ease;
		font-size:25px;
	}
	.input:focus {
		border-color: #037FFE;
	}
	.input:valid{
		border-color: #037FFE;
	}
	.to{
		font-size:25px;
		position:absolute;
		left:0;
	}
	.to_{
		position: absolute;
		left: 0px;
		padding-bottom: 1px;
		z-index:10;
		border:none;
		pointer-events: none;
	}
	.To{
		position: absolute;
		left:0px;
		padding-left:38px;
		z-index:1;
		width:300px;
	}
	.subj{
		font-size:25px;
		position:absolute;
		left:382px;
	}
	.subj_{
		position: absolute;
		left: -382px;
		top:40px;
		z-index: 10;
		font-size:25px;
		padding-bottom: 1px;
		border:none;
		pointer-events: none;
	}
	.Subj{
		position: absolute;
		top:40px;
		left:-383px;
		padding-left:87px;
		width:260px;
	}	
	.Massage{
		position: absolute;
		top:80px;
		outline: none;
		border:none;
		border-bottom: 1px solid #989898;
		background-color: #EEEEEE;
		resize: none;
		transition: all 1s ease;
		height:200px;
		width:335px;
		font-family: block;
	}
	.Massage:valid, .Massage:focus{
		background-color: #F8F8F8;
		border-bottom-color:#037FFE;
	}
	.send{
		position: absolute;
		top:300px;
		width:340px;
	}
	.formEmpf{
		width:100%;
	}
	.empf{
		position: absolute;
		top:400px;
		margin-left:5px;
		width:28.5%;
		left:-5px;
	}
	input[type="button"]{
		border-radius:2px;
	}
	@keyframes red{
		from{background-color: white;}
		to{background-color: red;}
	}
	footer{
		text-align: center;
		position: relative;
		bottom:-1000px;
	}
	.text{
		position: relative;
		left:100px;
		font-size:40px;
		top:100px;
	}
	.code{
		position: relative;
		top:100px;
		left:-100px;
		font-size:55px;
		width:500px;
		height:75px;
	}
	.button{
		position: relative;
		left:-100px;
		top:100px;
		height:40px;
		width:504px;
		background-color: lightgrey;
		border:1px solid grey;
	}
	.sendenForm{
		position: relative;
		top:100px;
	}
	@media only screen and (max-width: 950px){
		.to{
			left:-200px;
			top:-30px;
			width:100%;
		}
		.To{
			width:80%;
			top:30px;
			left:00px;
		}
		.to_{
			width:100%;
			left:0px;
			top:30px;
		}
		.subj{
			top:-30px;
			left:94px;
			width:100%;
		}
		.Subj{
			width:67%;
			top:80px;
			z-index: 3;
			padding-left:85px;
			left:-294px;
		}
		.subj_{
			width:100%;
			left:-295px;
			top:80px;
		}
		form{
			width:100%;
		}
		body{
			width:100%;
		}
		.Massage{
			width:85%;
			top:100px;
			left:-200px;
		}
		.send{
			top:320px;
			width:86%;
			left:-200px;
		}
		.empf{
			width:86%;
			left:-205px;
		}
	}
</style>
</style>
<body>
	<h1>J-Mail</h1><br>	
	<?php
		//Verbindung
			$rand = 0; 
			$servername = "rdbms.strato.de";
            $user = "";
            $pw = "";
            $db = "";
            $name =$_POST['benutzername'];
			$password =$_POST['passwort'];
			$code=$_POST['code'];
			$con = new mysqli($servername,$user,$pw,$db);

			if ($con->connect_error){
				die("Funktioniert nicht!".$con->connect_error);
			}
		// Login
			$sql = "SELECT * FROM User WHERE Name = '$name'";
			$very = "UPDATE `User` SET `Verified` = '1' WHERE Name = '$name'";
			$res = $con->query($sql);
			if ($res->num_rows>0){
				while ($i = $res->fetch_assoc()){
					if (password_verify($password,$i['Password'])) {
						if ($rand == 0){
							if ($i['Verified'] == 1){
								echo '
	<form action="senden.php" method="post" class="sendenForm" autocomplete="off">
	<span class="to"><span class="to_">To:</span> <input type="text" autocomplete="off" id="to" name="to" class="input To" required></span>
	<span class="subj"><span class="subj_">Subject:</span> <input type="text" id="subject" name="subject" class="input Subj" required></span><br>
	<textarea placeholder="Massage" class="Massage" name="massage" id="massage" required></textarea><br>
	<input type="hidden" name="from" value="', $name ,'"><input type="submit" value="senden" class="send"> </form> ';
								echo '<h2><form action="empfangen.php" method="post" class="formEmpf"> <input type="submit" value="Nachrichten empfangen" class="empf"></h2>';
							}
							if ($i['Verified']==0){
								if ($code == $i['VerifyCode']){
									if ($con->query($very) === TRUE){	
										echo "<div class='text'>Du wurdest erfolgreich verifiziert! Bitte lade diese Seite neu";
									}	
								}
							}

							
							if ($i['Verified'] == 0){
								echo '<div class="text">Ihr Account wurde noch nicht verifiziert</div><form action="#" method="post"><input type="hidden" name="benutzername" value="',$name,'"><input type="hidden" name="passwort" value="',$password,'">
								<input type="text" name="code" required placeholder="Verifizierungscode" class="code"><br><input value="Absenden" type="submit" class="button"></form>'; 
							}
							
							
						}
						$rand = 1;
						//Formular Senden

						} 
					}
				}
				if ($rand == 0) {
					echo "Falsche Anmeldedaten";	
					echo "<style>body{
					animation: red 1s ease;
					background-color:red;}
					</style>";
				}	
		
	?>		
	<input type="hidden" name="from" value="<?php 
				$name =$_POST['benutzername'];
				 echo $name;?>">
				 </form>
	<footer>
		<a href="http://projektejwkk.de/impressum.html" class="impressum">Impressum</a>
	</footer>
</body>
</html>