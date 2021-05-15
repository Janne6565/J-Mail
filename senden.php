<!DOCTYPE html>
<html>
<head>
	<title>J-Mail</title>
	<link rel="icon" type="image/png" size="undefined" data-hid="favicon" href="j-mail.png">
</head>
<body>
<?php
	//Verbinden
        $servername = "";
        $user = "";
        $pw = "";
        $db = "";
		$con = new mysqli($servername,$user,$pw,$db);


	// Nachrichten
		//Init
			$heute = date("\A\m\ d.m.y \u\m\: H:i:s");
			$message =$_POST[massage];
			$from =$_POST[from];
			$to =$_POST[to];
			$subject=$_POST[subject];
		// Senden
			$sql = "INSERT INTO Messages (Location, Subject, Channel, Receiver, Message) values ( '$heute','$subject', '$from', '$to', '$message')";
			if($con->query($sql) === TRUE){
				echo"Erfolgreich gesendet";
				echo "<style> body{
					animation: green 0.5s ease; 
					background-color:green;}
				@keyframes green{
					from{background-color: white;}
					to{background-color: green;}
				}
				</style>";
			}
			else{
				echo"Es gab einen Fehler! <br> Wir versuchen diesen zu beheben";
			}
?>
<br> <footer>
	<a href='http://projektejwkk.de/Zufall/impressum.html'>Impressum</a>
</footer>

</body>
</html>