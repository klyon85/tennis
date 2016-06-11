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
	<br />
		<p><a href='reserve.php'>Reserve a court</a></p>

  </form>
</div>
</body>
</html>
