<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
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
<link type="text/css" rel="stylesheet" href="style.css"/>
<link href='lib/cupertino/jquery-ui.min.css' rel='stylesheet' />
<script src="http://www.w3schools.com/lib/w3data.js"></script>
<script type='text/javascript' src='calready.js'></script>
</head>
<body>

	 <div w3-include-html="menu.html" class="menu"> </div>
 	 <script>
		w3IncludeHTML();
	 </script>
  <div class = "content">
	<?php
	
	session_start();
	$clientName = $_SESSION['name'];
	
	if(count($clientName) > 0) 
            
            echo "<h1>$clientName's UMW Tennis Reservation Portal</h1><a href = 'logout.php'> [LOGOUT OF THIS ACCOUNT]</a>";
        
        else
        
            echo "<h1>UMW Tennis Center Reservation Portal</h1> ";
	
	?> 
  <p>Welcome to the official UMW Tennis Center reservation portal! You can use this website to reserve court times and cancel them! Create an account or log in to started!</p>
    <p>Use the menu above to get started!</p>
    <p><em>If you cannot use a reservation you have made, please kindly cancel in advance to avoid extra fees and allow other players to take advantage of the court time.</em></p>
    <div id = "solid">
	<div id='calendar'></div>
	</div>
 </div>
</body>
</html>
