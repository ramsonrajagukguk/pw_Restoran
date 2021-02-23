<?php
include 'header.php';


$queryauto = "SELECT max(kode_penjualan) as maxKode FROM tbl_penjualan";
$hasil = mysqli_query($conn,$queryauto);
$data = mysqli_fetch_array($hasil);
$kodePenjualan = $data['maxKode'];
$noUrut = (int) substr($kodePenjualan, 3, 3);
$noUrut++;
$char = "P";
$kodePenjualan = $char . sprintf("%03s", $noUrut);
?>



<div class="container">
    <h3 class="text-center "><b>Transaksi Penjualan</b></h3>
    <div class="row">
        <div class="col">
            <div class="wrap">
                <div class="form-menu ">
                    <form method="post" action="transaksi_proses.php">
                        <div class="form-group">
                            <label>Kode Penjualan</label>
                            <input type="text" class="form-input" name="kode_penjualan"
                                value="<?php echo $kodePenjualan; ?>" readonly id=" id">
                        </div>
                        <div class="form-group">
                            <label>Nama Pembeli</label>
                            <input type="text" class="form-input" name="nama_pembeli" value="" required="" id="id"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Kode Petugas</label>
                            <input type="text" class="form-input" name="kode_petugas" value="" id="id" required>
                        </div>

                        <input type="submit" name="Submit_pembelian" class="tambah" value="Selanjutnya" />
                        <!-- <button type="submit" class="tambah">Simpan</button>
                        <button type="reset" class="batal">Batal</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>