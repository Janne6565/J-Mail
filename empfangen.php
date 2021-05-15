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
		height: 10000%;
	}
	h1{
		top:1px;
		border:none;
		padding:10px;
		margin: 0;	
		position: absolute;
	}
	.message{
		position:absolute;
		top:-250px;
		margin-left:200px;
		font-size:17px;
		margin-bottom:0px;
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
	.From{
		padding-left:90px;
		width:275px;
		margin-right: 500px
	}
	.from{
		font-size:25px;
		position:absolute;
		left:5px;
		z-index: 10;
	}
	.from_{
		position: absolute;
		left: 5px;
		padding-bottom: 1px;
		border:none;
		pointer-events: none;
	}
	.Subj{
		padding-left:95px;
		padding-top:0;
		width:272px;
		margin-right:500px;
	}
	.subj{
		top: 50px;
		font-size:25px;
		position:absolute;
		left:5px;
		z-index: 10;
	}
	.subj_{
		position: absolute;;
		left: 5px;
		font-size:25px;
		padding-bottom: 1px;
		border:none;
		pointer-events: none;
	}
	.date{
		margin-left: 18px;
		font-size:25px;
		position:absolute;
		left:-12px;
		top:100px;
		z-index: 10;
	}
	.date_{
		position: absolute;
		left: 5px;
		padding-bottom: 1px;
		border:none;
		pointer-events: none;
	}
	.Date{
		padding-left:65px;
		padding-top:0;
		width:305px;
		margin-right:1600px;
	}
	.Massage{
		position: absolute;
		top:150px;
		outline: none;
		border:none;
		border-bottom: 1px solid #989898;
		background-color: #EEEEEE;
		resize: none;
		margin-top:10px;
		transition: all 1s ease;
		margin-left:5px;
		height:200px;
		width:365px;
		font-family: block;
	}
	.Massage:valid, .Massage:focus{
		background-color: #F8F8F8;
		border-bottom-color:#037FFE;
	}
	.send{
		margin-left:5px;
		width:340px;
	}
	a{
		position: relative;
		text-align: center;
		align-content: center;
	}
	@keyframes red{
		from{background-color: white;}
		to{background-color: red;}
	}
	footer{
		text-align: center;
	}
	.delete{
		position: absolute;
		top:380px;
		margin-left:5px;
		width:370px;
	}
	@media only screen and (max-width: 950px){
		.message{
			transform: scale(0.8);
			left:-200px;
		}
	}
	.erased{
		position: absolute;
		left:200px;
	}
	.noMassages{
		position: absolute;
		top:100px;
		font-size: 40px;
	}
</style>
<body>
	<?php
		//Verbindung
		$rand = 0; 
        $servername = "";
        $user = "";
        $pw = "";
        $db = "";
		$con = new mysqli($servername,$user,$pw,$db);

		if ($con->connect_error){
			die("Funktioniert nicht!".$con->connect_error);
		}
			echo "$name <br>";
		// Login
			echo '<h1>J-Mail</h1>';
			$name = $_POST['from'];
			$sql = "SELECT * FROM Messages WHERE Receiver = '$name'";
			$res = $con->query($sql);
			$run = 0.7;
			if ($res->num_rows>0){
				while ($i = $res->fetch_assoc()){
					$rand = 1;
					//FNachrichten Entfangen
					$channel = $i[Channel];
					$subject = $i[Subject];
					$message = $i[Message];
					$date = $i[Location];
					$ID = $i[ID];
					$abstand = $run * 500; 
					echo '<span class="massagee'.$run.'px" style="position:absolute; top:'.$abstand.'px"><span class="message">
					<span class="from"><span class="from_">From :</span> <input type="text" readonly="true" id="to" name="to" class="input From" value="' , $channel, '"></span><br>
					<span class="subj"><span class="subj_">Subject: </span><input required="true" type="text" id="subject" name="subject" value="', $subject, '" class="input Subj" readonly="true"></span><br>
					<span class="date"><span class="date_">Date:</span> <input type="text" readonly="true" id="date" name="date" class="input Date" value="', $date, '"></span>	<textarea placeholder="Massage" required="true" class="Massage" name="massage" disabled="disabled">', $message , '</textarea><br><br>
					<form method="post" action="#">
						<input type="hidden" name="delete" value="', $ID, '">
						<input type="hidden" name="from" value="', $name ,'">
						<input type="submit" class="delete" value="Diese Nachricht entfernen">
					</form> </span></span>';
					$run = $run + 1;
					} 
				}
			// Nachrichten löschen
				$delete = $_POST['delete'];
				$del = "DELETE FROM Messages WHERE ID = '$delete'";
				$dele = $con->query($del);
				if ($con->query($del) === TRUE) {
					echo "<div class='erased'>Erfolgreich entfernt!</div>";
				}

				if ($rand == 0) {
					echo " <br><div class='noMassages'> Keine Nachrichten f&uumlr dich!</div>";
				}	
			?>		
			<form action="#" method="post">
	<input type="hidden" name="from" value="<?php 
				$name = $_GET['benutzername'];
				 echo $name;?>">
				 </form>
				 <br>
				 <footer>
		<a href="http://projektejwkk.de/Zufall/impressum.html" class="impressum">Impressum</a>
	</footer>
</body>
</html>