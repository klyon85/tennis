<!DOCTYPE html>
<html>
<head>
  <title>UMW Tennis Center - Reserve</title>
  <meta charset= "UTF-8"/>
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="http://www.w3schools.com/lib/w3data.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link href='fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>
<link href='lib/fullcalendar.min.css' rel='stylesheet' />
<link href='scheduler.min.css' rel='stylesheet' />
<script src='lib/moment.min.js'></script>
<script src='lib/fullcalendar.min.js'></script>
<script src='scheduler.min.js'></script>
<link href='lib/cupertino/jquery-ui.min.css' rel='stylesheet' />
<script type='text/javascript' src='calready.js'></script>
</head>
<body>
  <div w3-include-html="menu.html"  class="menu"></div>
  <script> w3IncludeHTML();</script>

  <div class="content">  
  <h1>UMW Tennis Center Account Reservation</h1>
   <div id = "solid">
	<div id='calendar'></div>
  </div>
  <br />
  <div id=instructions>
  	Please complete the form to request a reservation.  You may reserve a court up to 7 days in advance and for a maximum of 3 hours at a time.<br /><br />
  	<b>Tennis Center Hours</b><br />
	Monday - Friday: 	0900 - 2100 <br />
	Saturday: 			0900 - 1800 <br />
	Sunday: 			1100 - 1800 <br />
  </div>
  <form class="reserve" action="resscript.php" method="post">
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
	
	if($userId < 1) {
		
		echo "<p>Sorry, you are already logged in and therefore can't reserve a court.</p>";
		$conn.close();
	}
	
	//Get reservations from database and push to JSON
	$sql = "SELECT * FROM tennis_reservations;";
	$result = @mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQL_NUM);
	//insert JSON encoding function here.
	?>
  	<label>Date: </label><input type="date" name="date" id="date" required /><br />
  	<label>Start Time: </label><select id="start" name="start" required/>
            <option value="09:00:00">0900</option>
            <option value="10:00:00">1000</option>       
            <option value="11:00:00">1100</option>       
            <option value="12:00:00">1200</option>       
            <option value="13:00:00">1300</option>       
            <option value="14:00:00">1400</option>       
            <option value="15:00:00">1500</option>       
            <option value="16:00:00">1600</option>       
            <option value="17:00:00">1700</option>       
            <option value="18:00:00">1800</option>       
            <option value="19:00:00">1900</option>       
            <option value="20:00:00">2000</option>       
    </select><br />
  	<label>End Time: </label><select id="end" name="end" required/>
            <option value="10:00:00">1000</option>       
            <option value="11:00:00">1100</option>       
            <option value="12:00:00">1200</option>       
            <option value="13:00:00">1300</option>       
            <option value="14:00:00">1400</option>       
            <option value="15:00:00">1500</option>       
            <option value="16:00:00">1600</option>       
            <option value="17:00:00">1700</option>       
            <option value="18:00:00">1800</option>       
            <option value="19:00:00">1900</option>       
            <option value="20:00:00">2000</option>       
            <option value="21:00:00">2100</option>
    </select><br />
  	<label>Court: </label><select id="court" name="court" />
            <option value="i1">Indoor Court 1</option>
            <option value="i2">Indoor Court 2</option>
            <option value="i3">Indoor Court 3</option>
            <option value="i4">Indoor Court 4</option>
            <option value="i5">Indoor Court 5</option>
            <option value="i6">Indoor Court 6</option>
            <option value="o7">Outdoor Court 7</option>
            <option value="o8">Outdoor Court 8</option>
            <option value="o9">Outdoor Court 9</option>
            <option value="o10">Outdoor Court 10</option>
            <option value="o11">Outdoor Court 11</option>
            <option value="o12">Outdoor Court 12</option>
            <option value="o13">Outdoor Court 13</option>
            <option value="o14">Outdoor Court 14</option>
            <option value="o15">Outdoor Court 15</option>
            <option value="o16">Outdoor Court 16</option>
            <option value="o17">Outdoor Court 17</option>
            <option value="o18">Outdoor Court 18</option>

    </select><br />
	<br />
  	<label>Affiliation: </label><input size="50%" type="text" id="title" name="title" /><br />
	<input type="submit" name="submit" value="Request Reservation" />
  </form>
</div>
</body>
</html>
