<HTML>
<HEAD>
<TITLE> Test Login </TITLE>
</HEAD>
<BODY>
<?php

	include('mydbinfo.php');
	$conn = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if ( !$conn ) {
		echo("<p> Unable to connect to the database system" .
		"Please try later. </p>");
		exit();
	}	
	$email = htmlspecialchars($_POST["email"]);
	$password = htmlspecialchars($_POST["password"]);
	$e = mysqli_real_escape_string($conn, $email);
	$p = mysqli_real_escape_string($conn, $password);

	if ($e == "" || $p == "") {
		echo("<p>Field is blank.</p>");
		exit;
	} else {
		$sql = "SELECT email, password FROM tennis_users WHERE email='$e' AND password='$p'";
		$result = @mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQL_NUM);
		if ($row) {
			echo("True");
		} else {
			echo("False");
		}
	}
	$conn.close();
?>
</BODY>
</HTML>
