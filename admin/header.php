<?php 
  include 'Connection.php';
  session_start();  
  if(empty($_SESSION["user_id"])) 
      {
        echo '<script type = "text/javascript">';
        echo 'window.location="login.php"';
        echo '</script>';
      }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/png" href="../images/icons/favicon.png" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/homeadmin.css">

</head>

<body>

    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="title" href="AdminHome.php">Kopi Toast</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="adminhome.php">Daftar Menu</a></li>
                    <li><a href="transaksi.php">Transaksi </a></li>
                    <li><a href="#">Daftar Penjualan</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><img src="img/user.png" alt="admin" width="50px" height="50px" /></li>
                    <li><a>Admin</a></li>
                    <li>
                        <form action="logout.php" method="post">
                            <input type="hidden" name="ss" value="any">
                            <button type="submit" class="add-user btn btn-danger logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>