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
    <link rel="stylesheet" type="text/css" href="css/transaksi_pembayaran_nota.css">
</head>
<body>
  <script>
      window.print();
  </script>
  <div class="wrapper">
    <img src="img/logo.png" width="90" height="70" style="margin-left: 23px; margin-top: 5px;">
    <h3 style="margin-left: 4.5cm; margin-top: -1.3cm;">
      Terima Kasih Atas Kunjungan Anda <br>
      <center>TODAY Cafe & Eatery </center>
    </h3>
    <h4 style="text-align: center; margin-top: 1cm;"><b>TRANSAKSI PEMBELIAN</b></h4>
    <br>
    <?php
      include 'Connection.php';
      session_start();
      $kode_penjualan = $_SESSION['kode_transaksiPenjualan'];
      $total_penjualanTr = $_SESSION['total_penjualan'];
      
      $bayar = $_POST['bayar'];
      $kembalian = $bayar - $total_penjualanTr;

      $Query_update="UPDATE tbl_penjualan SET Total_penjualan=".$total_penjualanTr.",
                          Bayar=".$bayar.",
                          Kembali=".$kembalian." WHERE kode_penjualan='$kode_penjualan'";
      $Procces_update=mysqli_query($conn, $Query_update);
              
      $sqlFinishPenjualan = "SELECT * FROM tbl_penjualan WHERE kode_penjualan='$kode_penjualan'";
      $result = mysqli_query($conn, $sqlFinishPenjualan);
      while ($row=mysqli_fetch_array($result)) 
      {
        $TrTanggal = $row['tgl_penjualan'];
        $Trnama_pembeli =  $row['nama_pembeli'];
        $Trtotal_penjualan = $row['Total_penjualan'];
        $TrBayar = $row['Bayar'];
        $TrKembali = $row['Kembali'];
      }
      echo 
      "
        <table>
          <tr>
            <th >Kode Penjualan</th>
            <td>$kode_penjualan</td>
          </tr>
          <tr>
            <th>Tanggal Transaksi</th>
            <td>$TrTanggal</td>
          </tr>
          <tr>
            <th>Nama Pembeli</th>
            <td>$Trnama_pembeli</td>
          </tr>
          <tr>
            <th>Total Transaksi</th>
            <td>$Trtotal_penjualan</td>
          </tr>
          <tr>
            <th>Bayar</th>
            <td>$TrBayar</td>
          </tr>
          <tr>
            <th>Kembalian</th>
            <td>$TrKembali</td>
          </tr>
        </table>
        <br>
      ";
      
      echo 
      "
        <table>
          <tr>
            <th>ID Trans</th>
            <th>Judul Buku</th>
            <th>Jmlh</th>
            <th>Harga buku</th>
            <th>Total</th>
          </tr>
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

    ?>
    <center>
      <br>
      <form action="transaksi.php">
        <input type="submit" value="Transaksi Selesai" class="btn1" />
      </form> 
    </center>   
    
  </div>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>