<?php

        session_start();
  
	session_unset();
	
	echo "<p>Thank you for using our system. You have been logged out.</p>";
	echo "<p>Redirecting to the main page!</p>";
	
        $url3='index.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url3.'">';
  
  ?>
