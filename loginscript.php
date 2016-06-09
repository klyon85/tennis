<HTML>
<HEAD>
 <TITLE> Login </TITLE>
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
	} else {
                $sql = "SELECT password, user_id, email, fullname, phone FROM tennis_users WHERE email='$e'";
		$result = @mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQL_NUM);
		
		if ($row) {
			$verifyPassword = password_verify($p, $row[0]);
		  		if($verifyPassword != 1) {
		  			echo "<p>Sorry, the password and/or email you provided is not valid. Please try again. Redirecting to login page...</p>";
                                        $url0='login.php';
                                        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url0.'">';
				} else { 
						echo "<p>Your account was located... redirecting to the portal!</p>";
                                                $_SESSION['user_id'] = $row[1];
                                                $_SESSION['email'] = $row[2];
                                                $_SESSION['name'] = $row[3];
                                                $_SESSION['phone'] = $row[4];
				}
				
				}
				
				else {
					echo "<p>Sorry, your account was not found. Redirecting to the login page...</p>";
                                        $url1='login.php';
                                        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url1.'">';
				}
			}
                    
                    
                        $url2='index.php';
                        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url2.'">';
                        $conn.close();

?>
</BODY>
</HTML>
