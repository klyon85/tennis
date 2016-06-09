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
  <div w3-include-html="menu.html"  class="menu"></div>
  <script> w3IncludeHTML();</script>

  <div class="content">  
  <h1>UMW Tennis Center Account Registration</h1>
  <form class="registration" action="register.php" method="post">
  	<label>Name: </label><input type="text" name="name" id="name" required /><br />
  	<label>Phone: </label><input type="text" id="phone" name="phone"placeholder="XXX-XXX-XXXX" onblur = "phoneCheck();" required/><br />
  	<label>Email: </label><input type="email" name="email" id="email" placeholder="name@example.com" onblur = "emailCheck();" required/><br />
  	<br />
	Select your status: <br />
	<input type="radio" name="status" value="fulltime"/>Full-Time Student <br />
	<input type="radio" name="status" value="halftime"/>Half-Time Student <br />
	<input type="radio" name="status" value="facstaff"/>UMW Faculty/Staff <br />
	<input type="radio" name="status" value="noaff" checked="checked"/>No Affliation to UMW<br />
	<br />
	If you are a student, please enter your expected graduation date: <br /><br />
	
        <fieldset class="date"> 
        <legend>Graduation Month/Year: </legend> 
        <select id="month" name="month" />
            <option>N/A</option>
            <option>January</option>       
            <option>February</option>       
            <option>March</option>       
            <option>April</option>       
            <option>May</option>       
            <option>June</option>       
            <option>July</option>       
            <option>August</option>       
            <option>September</option>       
            <option>October</option>       
            <option>November</option>       
            <option>December</option>       
        </select> - 
        <select id="year_start" name="year_start" /> 
            <option>N/A</option>
            <option>2016</option>       
            <option>2017</option>       
            <option>2018</option>       
            <option>2019</option>       
            <option>2020</option>       
            <option>2021</option>       
            <option>2022</option>       
            <option>2023</option>       
            <option>2024</option>       
            <option>2025</option>       
        </select> 
    </fieldset> 
    <br />
        Enter a password for your account: <br />
            <input type="password" id="pass1" required/><br />
	Retype your account password:<br />
            <input type="password" id="pass2" name="password" onblur="passwordCheck();" required /><br />
	<br />
	<input type="submit" name="submit" value="Create Account" />
  </form>
</div>
</body>
</html>
