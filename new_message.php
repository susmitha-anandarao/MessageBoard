<html>
<head>
	<title>Message board</title>
	<style>
		body{
			background-color : GhostWhite;
			color : Navy;
		}
		.button {
			background-color : PaleTurquoise;
			border-radius : 5px;
			font-size : 100%;
			color : Navy;
		}
		textarea{
			border-radius : 20px;
			padding : 5px;
			margin : 5px;
			background-color : GhostWhite;
			color : Navy;
		}
		
		a{
			color : Navy;
		}
		h1{
			text-align : center;
		}
	</style>
</head>
<body>
<h1>Message Board</h1>
<?php
	session_start();
	if(isset($_GET['reply'])){
		print "<h3>New message</h3><form action = 'messageboard.php' method = 'GET'><input type = 'hidden' name = 'reply_message' value = '". $_GET['reply'] ."'/><textarea rows = '10' cols = '100' name = 'message'></textarea></br></br><input class = 'button' type='submit' value='Post'/></form>";
	}
	else{
		print "<h3>New message</h3><form action = 'messageboard.php' method = 'GET'><textarea rows = '10' cols = '100' name = 'message'></textarea></br></br><input class = 'button' type='submit' value='Post'/></form>";
	}
?>
</body>
</html>
	
