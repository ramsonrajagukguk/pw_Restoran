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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/logout.css">
    <link rel="stylesheet" type="text/css" href="css/transaksi_pembayaran.css">
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
    <h4 style="text-align: center; margin-top: 5cm;"><b>TRANSAKSI PENJUALAN</b></h4>
    <br>
    <ul>
      <li style='color: #333; margin-left: 15px;'>
        <font face='Poppins' color='#333'>Detail Pembelian</font>
      </li>
    </ul>   
    <?php
      session_start();
          
      include 'Connection.php';
      $kode_penjualan = $_SESSION['kode_transaksiPenjualan'];
      $total_penjualanTr = $_SESSION['total_penjualan'];

      $Query_update="UPDATE tbl_penjualan SET Total_penjualan=".$total_penjualanTr." 
      WHERE kode_penjualan='$kode_penjualan'";

      $Procces_update=mysqli_query($conn, $Query_update);
              
      $sqlFinishPenjualan = "SELECT * FROM tbl_penjualan WHERE kode_penjualan='$kode_penjualan'";
      $result = mysqli_query($conn, $sqlFinishPenjualan);
      while ($row=mysqli_fetch_array($result)) 
      {
        $Trnama_pembeli =  $row['nama_pembeli'];
      }
      echo 
      "
        <table>
          <thead>
            <tr>
              <th>Kode Penjualan</th>
              <td>$kode_penjualan</td>
            </tr>
            <tr>
              <th>Nama Pembeli</th>
              <td>$Trnama_pembeli</td>
            </tr>
          </thead>
        </table>
      ";
      
      echo 
      "
        <br>
        <ul>
          <li style='color: #333; margin-left: 15px;'>
            <font face='Poppins' color='#333'>Daftar Pembelian</font>
          </li>
        </ul>
        <table>
          <thead>
            <tr>
              <th>ID Trans</th>
              <th>Nama buku</th>
              <th>Jmlh</th>
              <th>Harga buku</th>
              <th>Total</th>
            </tr>
          </thead>
        ";
      $sql="SELECT  a.kode_penjualan,
                    a.kode_menu,
                    b.nama_menu,
                    a.jumlah_jual,
                    b.harga,
                    a.total
            FROM tbl_detailpenjualan as a, menu as b 
            WHERE a.kode_menu=b.id_menu AND kode_penjualan='".$_SESSION['kode_transaksiPenjualan']."'";
      $result = mysqli_query($conn, $sql);
      while ($row= mysqli_fetch_array($result)) 
      {
        echo 
        "  
          <tr>
            <td>$row[kode_penjualan]</td>
            <td>$row[nama_menu]</td>
            <td>$row[jumlah_jual]</td>
            <td>$row[harga]</td>
            <td>$row[total]</td>
          </tr>
        ";
      }
      echo 
      "
        </table>
      ";
      echo 
      "
        <br>
        <ul>
          <li style='color: #333; margin-left: 15px;'>
            <font face='Poppins' color='#333'>Pembayaran</font>
          </li>
        </ul>
        <form action='transaksi_pembayaran_nota.php' method='post'>
          <table>
            <thead>
              <tr>
                <td>Total</td>
                <td>".$_SESSION['total_penjualan']."</td>
              </tr>
              <tr>
                <td>Bayar</td>
                <td>
                  <input type='text' name='bayar' value='' style='width: 150px; height: 30px;'
                  required=''/>
                </td>
              </tr>
            </thead>
            <tr>
              <td colspan='2'>
                <center>
                  <input type='submit' name='submit' value='Bayar' style='width: 150px; height: 30px;'/>
                </center>
              </td>
            </tr>
          </table>
        </form>
      ";
    ?>    
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>