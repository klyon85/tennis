<HTML>
<HEAD>
<TITLE> Reservation Confirmation </TITLE>
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
	$userId = $_SESSION["user_id"];
	if ($userId < 1) {
		echo "<p>You are not logged in and cannot create a reservation at this time.</p>";
		exit();
	}

	$t = htmlspecialchars($_POST["title"]);
    	$s = htmlspecialchars($_POST["start"]);
	$e = htmlspecialchars($_POST["end"]);
    	$d = htmlspecialchars($_POST["date"]);
	$c = htmlspecialchars($_POST["court"]);
	
	$title = mysqli_real_escape_string($conn, $t);
	$st = mysqli_real_escape_string($conn, $s);
	$en = mysqli_real_escape_string($conn, $e);
    	$date = mysqli_real_escape_string($conn, $d);
	$court = mysqli_real_escape_string($conn, $c);
	if ($title == "" || $st == "" || $en == "" || $date == "" || $court == "") {
		echo "<p>An entry is blank. Please try again.</p>";
		echo "<p><a href='index.php'>[Return Home.]</a><p>";
	} else {
    	//Check for a reexisting reservation
		//$select1 = "SELECT start, end FROM tennis_reservations WHERE court='$court' AND date='$date'"; 
		//$result = @mysqli_query($conn, $sql);
		//$row = mysqli_fetch_array($result, MYSQL_NUM);
		
		$start = $date."T".$st;
		$end = $date."T".$en;
		$isql = "INSERT INTO tennis_reservations(user_id, title, start, end, date, court) VALUES('$userId', '$title', '$start', '$end', '$date', '$court');";
		$iresult = @mysqli_query($conn, $isql);
		$irow = mysqli_fetch_array($iresult, MYSQL_NUM);
		if (irow) {
			echo "<p>Your reservation has been saved. Please arrive promptly to pay any charges for court usage.";
			echo "<p><a href='index.php'>[Return Home.]</a></p>";
		
		//This JSON code was grabbed from http://stackoverflow.com/questions/7895335/append-data-to-a-json-file-with-php
                
                	$AdditionalArray = array("title" => "$title", "id" => "$date", "start" => "$start", "end" => "$end", "resourceId" => "$court");

                	//open or read json data
                	$data_results = file_get_contents('evt.json');

                	$tempArray = json_decode($data_results);
                	//append additional json to json file
                	$tempArray[]=$AdditionalArray;
                	$jsonData = json_encode($tempArray);

                	file_put_contents('evt.json', $jsonData);   
                
                //end of borrowed source code
		} else {
			echo "<p>Could not save entry. Please try again later.</p>";
			echo "<p><a href='index.php'>[Return Home.]</a><p>";
		}
	}
	$conn.close();
?>
</BODY>
</HTML>
		
