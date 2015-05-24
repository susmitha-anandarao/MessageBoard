<html>
<head><title>Message Board</title></head>
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
		input{
			border-radius : 10px;
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
<body>
<h1>Message Board Registration</h1>
<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
print "<table><form action = 'new_user.php' method = 'POST'><tr><td>Username : </td><td><input type='text' name='username'/></td></tr><tr><td>Password : </td><td><input type='password' name='password'/></td></tr><tr><td>Full name : </td><td><input type='text' name='fullname'/></td></tr><tr><td>Email id : </td><td><input type='text' name='email'/></td></tr><tr colspan = '2'><td><input class = 'button' type='submit' value='Register'/></td></tr></form></form></table>";

if((isset($_POST['username'])) && (isset($_POST['password'])) && (isset($_POST['fullname'])) && (isset($_POST['email']))){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	try {
		$dbh = new PDO("mysql:host=127.0.0.1:3306;dbname=board","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$dbh->beginTransaction();
		$stmt = $dbh->prepare("select * from users where username = '" . $username . "'");
		$stmt->execute();
		if(!null == $stmt->fetch()){
			header('Location: new_user.php');
  			exit;
  		}
		else{
			$dbh->exec("insert into users values('$username','" . md5($password) . "','$fullname','$email')")
        	or die(print_r($dbh->errorInfo(), true));
			$dbh->commit();
  			$stmt = $dbh->prepare('select * from users');
			$stmt->execute();
			print "<pre>";
			while ($row = $stmt->fetch()) {
				print_r($row);
			}
			print "</pre>";
			header('Location: board.php');
  			exit;
  		}
	}catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
}

?>
</body>
</html>
