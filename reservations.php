<!DOCTYPE html>
<html>
<head>
 	<title>UMW Tennis Center - My Reservations</title>
	<meta charset= "UTF-8"/>
	<link type="text/css" rel="stylesheet" href="style.css"/>
	<script src="http://www.w3schools.com/lib/w3data.js></script>
</head>
<body>

  <div class = "menu" w3-include-html="menu.html"></div>
  <script> w3IncludeHTML();</script>
  <div class = "content">
     
  		<h1>My Reservations</h1>

      	<h2>Upcoming Reservations</h2>
	    	<div>
		    	List upcoming appointments with a cancel button for each?  Would need popup to confirm cancelation, delete from DB, and check for 24-hour notice. Charge user account as necessary.
			<table>
					<tr>
						<th>Date</td>
						<th>Reservation Time and Duration</td>
						<th>Cancel?</td>
					</tr>
					<tr>
						<td>6/1/2015</td>
						<td>1.5 hour session</td>
						<td>A button?</td>
					</tr>
				</table>
			</div>
		<h2>Past Reservations</h2>
			<div>
				Table to show date of transaction, charge or credit to the account, and amount.
				<table>
					<tr>
						<th>Date</td>
						<th>Action</td>
						<th>Amount</td>
					</tr>
					<tr>
						<td>5/28/2015</td>
						<td>1.5 hour session</td>
						<td>-25.00</td>
					</tr>
				</table>	
			</div>
	</div>
</body>
</html>
