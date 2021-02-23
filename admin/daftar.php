<?php 
  include 'Connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>

	<!-- Bootstrap -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/logout.css">
    <link rel="stylesheet" type="text/css" href="css/daftar.css">
</head>
<body>
	<div class="wrapper">
		<img src="img/logo.png" width="90" height="70" style="margin-left: 10px;">
    <a href="logout.php">
  		<div class="out_wrap">
        <button class="learn-more">
          <div class="circle">
            <span class="icon arrow"></span>
          </div>
          <p class="button-text">Log Out</p>
        </button>
      </div>
    </a>
		<br><hr>
    <div class="container_nb">
      <img src="img/img_transaksi.png" alt="Snow">
      <a href="transaksi.php">
    		<button class="btn outline">
    			<b>Transaksi</b>
    		</button>
      </a>
    </div>
    <div class="container_nb">
      <img src="img/img_menu.jpg" alt="Snow">
      <a href="menu.php">
    		<button class="btn outline">
    			<b>Menu</b>
    		</button>
      </a>
    </div>
    <div class="container_nb">
      <img src="img/biji_kopi.jpg" alt="Snow">
      <a href="daftar.php">
    		<button class="btn outline">
    			<b>Daftar</b>
    		</button>
      </a>
    </div>
    <h3 style="text-align: center; margin-top: 5.5cm;"><b>DAFTAR MENU PENJUALAN</b></h3>
    <br>
    <form method="post" action="daftar.php">
      <input type="text" name="txtcari" id="cari" class="textbox" placeholder="Cari Daftar Penjualan" required="">
      <input title="Search" name="pencarian" id="submit" value="" type="submit" class="button">
    </form>
    <br><br>
    <?php
      include 'Connection.php';
      session_start();     
      if(empty($_SESSION["user_id"])) 
      {
        echo '<script type = "text/javascript">';
        echo 'window.location="login.php"';
        echo '</script>';
      }
      echo "<table>
          <tr>
            <th>Kode Transaksi</th>
            <th>Nama Pembeli</th>
            <th>Tanggal Transaksi</th>
            <th>Total Penjualan</th>
          </tr>";
          $pencarian_Transaksi = isset($_POST['txtcari'])? $_POST['txtcari']:"";
          $tampil = mysqli_query($conn,"SELECT kode_penjualan,
                                                nama_pembeli,
                                                tgl_penjualan,
                                                Total_penjualan 
                                        FROM tbl_penjualan  
                                        WHERE kode_penjualan 
                                        like '%$pencarian_Transaksi%' 
                                        or nama_pembeli like '%$pencarian_Transaksi%'
                                        or tgl_penjualan like '%$pencarian_Transaksi%'
                                        or Total_penjualan  like '%$pencarian_Transaksi%'
                                        ");
          while ($r =  mysqli_fetch_array($tampil)) 
          {
            echo 
            "
              <tr>
                <td>$r[kode_penjualan]</td>
                <td>$r[nama_pembeli]</td>
                <td>$r[tgl_penjualan]</td>
                <td>$r[Total_penjualan]</td>
              </tr>";
          }
      echo "</table>";
    ?>
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>