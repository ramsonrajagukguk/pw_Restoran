<?php 
	session_start();
	include 'Connection.php';
	if(empty($_SESSION["user_id"])) 
      {
        echo '<script type = "text/javascript">';
        echo 'window.location="login.php"';
        echo '</script>';
      }
    if(!empty($_SESSION["user_id"])) 
      {
        echo '<script type = "text/javascript">';
        echo 'window.location="adminhome.php"';
        echo '</script>';
      }
    
 ?>