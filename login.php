<HTML>
<HEAD>
<TITLE> Test Login </TITLE>
</HEAD>
<BODY>
<?php
    
    session_start();
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
	} 
	else {
		$sql = "SELECT password FROM tennis_users WHERE email='$e'";
		$result = @mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQL_NUM);

		if ($row) {
          		$verifyPassword = password_verify($p, $row[0]);
          
          		if($verifyPassword != 1) {
            			echo "<p>Sorry, the password and/or email you provided is not valid. Please try again.</p>";
            			exit;
    			}
    			
        		else { 
            			echo "<p>Login with secure hashing successful!</p>"; }
            			$_SESSION['current_user'] = $e;
			      } 
        	else {
			echo "There was a problem...";
		}
	}
	$conn.close();
?>
</BODY>
</HTML>
		
