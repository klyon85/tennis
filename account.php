<!DOCTYPE html>
<html>
<head>
  <title>UMW Tennis Center - Register</title>
  <meta charset= "UTF-8"/>
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="http://www.w3schools.com/lib/w3data.js"></script>
<script type="text/javascript" src="forms.js"></script>
</head>
<body>
   <div w3-include-html="menu.html" class = "menu"></div>
   <script> w3IncludeHTML();</script>
<div class="content">  
  <h1>My Account Information</h1>
    <?php
        session_start();
  
	$userId = $_SESSION["user_id"];
	
	if($userId < 1) {
		
		echo "<p>Sorry, you are not logged in, so there is no account info for you.</p>";
		exit();
	}
	
	$name = $_SESSION["name"];
	$phone = $_SESSION["phone"];
	$email = $_SESSION["email"];
  ?>
  <form class="registration" action="" method="post">
  	<label>Name: </label><?php echo "$name" ?><br />
  	<label>Phone: </label><?php echo "$phone" ?><br />
  	<label>Email: </label><?php echo "$email" ?><br />
  	<br />
        <p>For security reasons, we cannot show your password. Ask an administrator to reset it if you forgot it.</p>
        <p><a href = 'logout.php'> [LOGOUT OF THIS ACCOUNT]</a></p>
		<p><a href='reserve.php'>Reserve a court</a></p>
  </form>
  <div id="acctable">
	<h3>My Reservations</h3>
  	<table style="width: 100%">
	  <tr>
	  	<th>Date</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Court</th>
	  </tr>

	  <?php
		$userId = $_SESSION["user_id"];
		include ('mydbinfo.php');
	    $conn = @mysqli_connect($db, $dbuser, $dbpass, $dbname);
        if ( !$conn ) {
		    echo("<p> Unable to connect to the database system" .
		         "Please try later. </p>");
		    exit();
		}
		
		//Referenced: http://www.w3schools.com/php/php_mysql_select.asp
		//To loop through the select data
		//Referenced:  http://www.w3schools.com/php/php_ref_string.asp
		//For site-wide string methods
		$ssql = "SELECT date, start, end, court FROM tennis_reservations WHERE user_id='$userId' ORDER BY start DESC";
		$sresult = @mysqli_query($conn, $ssql);
		if (mysqli_num_rows($sresult) > 0) {
			while ($srow = mysqli_fetch_assoc($sresult)) {
				$s = $srow["start"];
				$e = $srow["end"];
				$start = substr($s, 11, 5);
				$end = substr($e, 11, 5);
				$c = $srow["court"];
				
				//Switch statement example at http://www.w3schools.com/php/php_switch.asp
				switch ($c) {
					case "i1":
						$court =  "Indoor Court 1";
						break;
					case "i2":
						"$court =  Indoor Court 2";
						break;	
					case "i3":
						$court =  "Indoor Court 3";
						break;
					case "i4":
						$court =  "Indoor Court 4";
						break;
					case "i5":
						$court =  "Indoor Court 5";
						break;
					case "i6":
						$court =  "Indoor Court 6";
						break;
					case "o7":
						$court =  "Outdoor Court 7";
						break;
					case "i1":
						$court =  "Indoor Court 1";
						break;
					case "o8":
						$court = "Outdoor Court 8";
						break;
					case "o9":
						$court = "Outdoor Court 9";
						break;
					case "o10":
						$court ="Outdoor Court 10";
						break;
					case "o11":
						$court ="Outdoor Court 11";
						break;
					case "o12":
						$court ="Outdoor Court 12";
						break;
					case "o13":
						$court ="Outdoor Court 13";
						break;
					case "o14":
						$court = "Outdoor Court 14";
						break;
					case "o15":
						$court = "Outdoor Court 15";
						break;
					case "o16":
						$court = "Outdoor Court 16";
						break;
					case "o17":
						$court = "Outdoor Court 17";
						break;
					case "o18":
						$court = "Outdoor Court 18";
						break;
				}
				$start = trim($start);
				$end = trim($end);
				$court = trim($court);
				echo "<tr>";
				echo "<td>".$srow["date"]."</td>";
				echo "<td>$start</td>";
				echo "<td>$end</td>";
				echo "<td>$court</td>";
				echo "</tr>";
				}

		} else {
			echo "<tr><td>None found</td><td></td><td></td></tr>";
		}
		mysqli_close($conn);
	?>
	</table>
  </div>
</div>
</body>
</html>
