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
	
	$mystart = substr($st, 0, 2); //get the hours of the times
	$myend = substr($en, 0, 2);
	
	if ($title == "" || $st == "" || $en == "" || $date == "" || $court == "") {
		echo "<p>An entry is blank. Please try again.</p>";
		echo "<p><a href='index.php'>[Return Home.]</a><p>";
		exit();
	} else {
		//Check for valid time
		$validtime = true;
		$diff = $en - $st;
		if ($diff <= 0 || $diff >= 3)
			$validtime = false;

		//Reference: http://www.w3schools.com/php/php_ref_date.asp
		//For PHP date methods and related info

		//Check for valid hours of day of the week
		$y = substr($date, 0, 4);
		$m = substr($date, 5, 2);
		$d = substr($date, 8, 2);
		$jd = gregoriantojd($m, $d, $y);
		$day = jddayofweek($jd); //0 is sunday, 6 is Saturday
		$today = date("d");
		$tohour = date("H");
		$daydiff = $d - $today;
		
		if ($daydiff < 0 || $daydiff > 7) {
			$validtime = false;
		} elseif ($daydiff == 0 && $mystart <= $tohour) {
			$validtime = false;
		}
		
		if ($day == 0 && ($mystart < 11 || $mystart > 17 || $myend < 12 || $myend > 18)) { //Sunday
			$validtime = false;
		} elseif ($day == 6 && ($mystart < 9 || $mystart > 17 || $myend < 10 || $myend > 18)) { //Satruday
			$validtime = false;
		}

		if (!$validtime) {
			echo "<p>The time or date you have selected is not valid. Please try another.</p>";
			echo "<p><a href='index.php'>[Return Home.]</a><p>";
			exit();
		}

		//Check if user has already created a reservation for that day
		$usql = "SELECT * FROM tennis_reservations WHERE user_id='$user_id' AND date='$date'"; 
		$uresult = @mysqli_query($conn, $ssql); 
		$datecreated = false;
		if (mysqli_num_rows($uresult) > 0) {
			$datecreated = true;
		} else {
			$reserved = true;
		}
		if ($datecreated) {
			echo "<p> You may reserve a court once per date. You have already initialized a reservation for this date. Please select another. </p>";
			echo "<p><a href='index.php'>[Return Home.]</a><p>";
			exit();
		}

    	//Check for a reexisting reservation
		$ssql = "SELECT start, end FROM tennis_reservations WHERE court='$court' AND date='$date'"; 
		$sresult = @mysqli_query($conn, $ssql); 
		$reserved = false;
		if (mysqli_num_rows($sresult) > 0) {
			while ($srow = mysqli_fetch_array($sresult)) {
				$thisstart = substr($srow['start'], 11, 2);
				$thisend = substr($srow['end'], 11, 2);
				if ($mystart >= $thisstart && $mystart <= $thisend) {
					$reserved = true;
				}
				if ($myend >= $thisend && $myend >= $thisend) {
					$reserved = true;
				}

			}
		}
		if ($reserved) {
			echo "<p> The selected timeslot for this court is already reserved.  Please select a different time and/or court. </p>";
			echo "<p><a href='index.php'>[Return Home.]</a><p>";
			exit();
		}
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
		
