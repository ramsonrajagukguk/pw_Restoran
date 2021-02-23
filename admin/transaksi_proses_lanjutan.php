<?php
include 'header.php';



   echo 
      "
      <div class='container'>
    <h3 class='text-center '><b>Transaksi Penjualan</b></h3>
    <div class='row'>
        <div class='col'>
            <div class='wrap'>
                <div class='form-menu'>
                <form action='transaksi_proses_lanjutan_keranjang.php' method='post'>
                        <div class='form-group'>
                            <label>Kode Transaksi</label>
                            <input type='text' class='form-input' name='kode_penjualan'
                                value=".$_SESSION['kode_transaksiPenjualan']." readonly id=' id'>
                          </div>

                          <div class='form-group'>
                          <label>Kode Menu</label>
                          <select class='form-input' name='kode_menu'>";
                          ?>

<?php
                include 'Connection.php';
                $result = mysqli_query($conn, "SELECT * FROM menu");
                while ($row = mysqli_fetch_array($result)) {
                  echo 
                  "
                    <option value='$row[id_menu]'>
                      $row[id_menu] - $row[nama_menu] - $row[harga]
                    </option>";
                }                         
                echo "</select>
                      </div>
                      
                      <div class='form-group'>
                      <label>Jumlah Pesan</label>
                      <input type='text' class='form-input' name='jumlah_jual'   required>
                    </div>

                    <input type='submit' name='submit' value='Tambahkan ke keranjang' class='tambah'/>
              </form>
              </div>
              </div>
              </div>
              </div>
              </div>   ";
    
      echo 
      "

<br>
      <div class='container'>
      <div class='row'>
        <div class='col'>
    <table class='table table-bordered table-hover'>
        <thead>
            <tr>
            <th>ID Transaksi</th>
            <th>Nama Menu</th>
            <th>Jumlah</th>
            <th>Harga Buku</th>
            <th>Total</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <thead>";
            $sql="SELECT a.kode_penjualan,
            a.kode_menu,
            b.nama_menu,
            a.jumlah_jual,
            b.harga,
            a.total
            FROM tbl_detailpenjualan as a, menu as b
            WHERE a.kode_menu = b.id_menu AND kode_penjualan='".$_SESSION['kode_transaksiPenjualan']."'";
            $result = mysqli_query($conn, $sql);
            while ($row= mysqli_fetch_array($result))
            {
            echo
            "
            <tr>
                <td style='text-align: center;'>$row[kode_penjualan]</td>
                <td>$row[nama_menu]</td>
                <td style='text-align: center;'>$row[jumlah_jual]</td>
                <td>$row[harga]</td>
                <td>$row[total]</td>
                <td><a href=transaksi_proses_lanjutan_keranjang_delete.php?kode_menu=$row[kode_menu]>Hapus</a></td>
            </tr>
            ";
            }
            echo
            "
</table>
</table>
</div>
</div>
</div>";

$sqlTotal = "SELECT SUM(total) FROM tbl_detailpenjualan WHERE
kode_penjualan='".$_SESSION['kode_transaksiPenjualan']."'";
$result = mysqli_query($conn, $sqlTotal);
$total =0;
while ($row = mysqli_fetch_array($result))
{
$total = $row[0];
}
echo
"
<h1 style='color: #fff'>
    <center>Total Pembelian : IDR. ".$total."</center>
</h1>
";

$_SESSION['total_penjualan'] = $total;

echo 
"
  <form action='transaksi_pembayaran.php' method='post' style='text-align: center;'>
         <input type='hidden' name='kode_penjualan' value='".$_SESSION['kode_transaksiPenjualan']."' />
      <input type='submit' name='' class='tambah' value='Lanjut Pembayaran'/>
     </form>
";     

include 'footer.php';
?>