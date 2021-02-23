<?php
session_start();
include 'Connection.php';
$message="";



if(!empty($_POST["login"])) {
	if(empty($_POST["username"]) || empty($_POST["password"])){
		$message = "Username dan Password Kosong";
	}else{

		$result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
		$row  = mysqli_fetch_array($result);
		if(is_array($row)) $_SESSION["user_id"] = $row['user_id'];
		else $message = "Username dan Password Salah!!";
	}
	
}

if(!empty($_POST["logout"])) {
	$_SESSION["user_id"] = "";
	session_destroy();
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
.st0 {
    fill: none;
}

.st01 {
    fill: #fff;
}

body {
    margin: 0px;
    background-color: #00467F;
    background: linear-gradient(45deg, #49a09d, #5f2c82);
    background-attachment: fixed;
}
</style>

<body>
    <div class="session">
        <?php if(empty($_SESSION["user_id"])) { ?>
        <form action="" method="post" id="frmLogin" class="log-in">
            <img src="../images/logo.jpg" width="70" height="55" style="margin-left: 6.5cm; margin-top: -20px;">
            <h4 style="margin-top: -50px;">
                Silahkan Login
            </h4>

            <div class="floating-label" style="margin-top: -30px;">
                <label for="login">Username:</label>
                <input placeholder="Username" name="username" type="text">
            </div>

            <div class="floating-label">
                <label for="password">Password:</label>
                <input placeholder="Password" name="password" type="password">
            </div>
            <div class="error-message" style="margin-left: 44px;">
                <?php if(isset($message)) { echo $message; } ?>
            </div>
            <br>

            <button type="submit" name="login" value="Login" class="form-submit-button" style="margin-left: 95px;">
                Log In
            </button>
            <div class="kembali">
                <a href="../index.php">Kembali</a>
            </div>
        </form>
        <?php 
		} else { 
			echo'<script type = "text/javascript">';
			echo 'window.location="adminhome.php"';
			echo '</script>';
			?>
        <?php } ?>

    </div>
</body>

</html>