<!DOCTYPE html>
<html>
<head>
  <title>UMW Tennis Center - Reserve</title>
  <meta charset= "UTF-8"/>
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="http://www.w3schools.com/lib/w3data.js"></script>
<script type="text/javascript" src="forms.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="rescheck.js"></script>
</head>
<body>
  <div w3-include-html="menu.html"  class="menu"></div>
  <script> w3IncludeHTML();</script>

  <div class="content">  
  <h1>UMW Tennis Center Account Reservation</h1>
  <div id=instructions>
  	Please complete the form to request a reservation.  You may reserve a court up to 7 days in advance and for a maximum of 3 hours at a time.
  </div>
  <form class="reserve" action="" method="post">
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
	
	if($userId > 0) {
		
		echo "<p>Sorry, you are already logged in and therefore can't reserve a court.</p>";
		$conn.close();
	}
	
	?>
  	<label>Date: </label><input type="date" name="date" id="date" required /><br />
  	<label>Start Time: </label><select id="start" name="start" required/>
            <option>0900</option>
            <option>1000</option>       
            <option>1100</option>       
            <option>1200</option>       
            <option>1300</option>       
            <option>1400</option>       
            <option>1500</option>       
            <option>1600</option>       
            <option>1700</option>       
            <option>1800</option>       
            <option>1900</option>       
            <option>2000</option>       
    </select><br />
  	<label>End Time: </label><select id="end" name="end" required/>
            <option>1000</option>       
            <option>1100</option>       
            <option>1200</option>       
            <option>1300</option>       
            <option>1400</option>       
            <option>1500</option>       
            <option>1600</option>       
            <option>1700</option>       
            <option>1800</option>       
            <option>1900</option>       
            <option>2000</option>       
            <option>2100</option>
    </select><br />
  	<label>Court: </label><select id="court" name="court" />
            <option>Court 1 - Indoor</option>
            <option>Court 7 - Outdoor</option>
    </select><br />
	<br />
  	<label>Affiliation: </label><input size="50%" type="text" id="title" name="title" /><br />
	<input type="submit" name="submit" value="Request Reservation" />
  </form>
</div>
</body>
</html>
