<!DOCTYPE html>
<html>
<head>
  <title>UMW Tennis Center - Register</title>
  <meta charset= "UTF-8"/>
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="http://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>
  <div w3-include-html="menu.html" action="loginscript.php" class = "menu"> </div>
  <script>
  	w3IncludeHTML();
  </script>
  <div class="content">  
  <h1>UMW Tennis Center Account Login</h1>
  <?php
        session_start();
  
	$userId = $_SESSION["user_id"];
	
	if($userId > 0) {
		
		echo "<p>Sorry, you are already logged in and therefore can't log into another account.</p>";
		echo "<p><a href = 'logout.php'> [LOGOUT OF THIS ACCOUNT]</a></p>";
		$conn.close();
	}
  
  ?>
          <form class="registration" action="loginscript.php" method="post">
  	<label>Email: </label><input type="email" name="email" id="email" required/><br />  	
        <label>Password: </label><input type="password" id="password" name="password" required/><br />
	<br />
	<input type="submit" name="submit" value="Login" />
  </form>
</div>
</body>
</html>
