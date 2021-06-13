<?php 

	include "mail.php";
	//send_mail($recipient,$subject,$message);

	$error = "";

	if(count($_POST) > 0)
	{

		//something was posted
		$recipient = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		if(empty($recipient)){
			$error .= "recipient can not be empty<br>";
		}

		if(empty($subject)){
			$error .= "subject can not be empty<br>";
		}

		if(empty($message)){
			$error .= "message can not be empty<br>";
		}
		
		if($error == "")
		{
			if(send_mail($recipient,$subject,$message))
			{
				$error .= "Message sent!<br>";
			}else
			{
				$error .= "Message NOT sent!<br>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Website</title>
</head>

<body style="font-family: tahoma;">

	<style type="text/css">
		
		form{
			width: 300px;
			padding: 10px;
			box-shadow: 0px 0px 10px #aaa;
			margin: auto;
			margin-top: 20px;
			border-radius: 10px;
		}

		form input{
			width: 270px;
			padding: 10px;
			border: solid thin #aaa;
			border-radius: 10px;
			margin: 5px;
			outline: none;
		}

		.btn{

			width: 290px;
			cursor: pointer;
		}

		.text{
			border: solid thin #aaa;
			border-radius: 10px;
			border: solid thin #aaa;
			width: 270px;
			margin-left: 5px;
			padding: 10px;
		}

	</style>

	<form method="post">
		<h3>Send Email</h3>
		<div>
			<?php if($error != ""):?>
				<span style="color: red;"><?=$error?></span>
			<?php endif;?>
		</div>
		<input type="text" name="email" placeholder="Receiver Email" autofocus="true"><br> 
		<input type="text" name="subject" placeholder="Subject"><br> 
		<textarea class="text" name="message"></textarea><br><br>
		<input class="btn" type="submit" value="Send">

	</form>
</body>
</html>