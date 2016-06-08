<HTML>
<HEAD>
<TITLE> Test Registration </TITLE>
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
	$name = htmlspecialchars($_POST["name"]);
	$phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
	$status = htmlspecialchars($_POST["status"]);
    $month = htmlspecialchars($_POST["month"]);
	$year = htmlspecialchars($_POST["year_start"]);
    $password = htmlspecialchars($_POST["password"]);
	
	$name1 = mysqli_real_escape_string($conn, $name);
	$phone1 = mysqli_real_escape_string($conn, $phone);
	$email1 = mysqli_real_escape_string($conn, $email);
	$status1 = mysqli_real_escape_string($conn, $status);
    $month1 = mysqli_real_escape_string($conn, $month);
	$year1 = mysqli_real_escape_string($conn, $year);
	$password1 = mysqli_real_escape_string($conn, $password);
    //echo("<p>One or more fields was left blank. $name1 $phone1 $email1 $status1 $month1 $year1 $password1</p>");

	if ($name1 == "" || $phone1 == "" || $email1 == "" || $status1 == "" || $year1 == "" || $password1 == "") {
		exit;
	} else {
        
    $password1 = password_hash($password1, PASSWORD_DEFAULT);
		$sql = "INSERT INTO tennis_users(email, password, phone, status, graddate) VALUES ('$email1', '$password1', '$phone1', '$status1', '$month1.$year1');";
		$result = @mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQL_NUM);

		echo "You have registered successfully. Please head over to the login page to get started.";
	}
	$conn.close();
?>
</BODY>
</HTML>
		
