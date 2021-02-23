<?php
include 'header.php';


$queryauto = "SELECT max(id_menu) as maxKode FROM menu";
$hasil = mysqli_query($conn,$queryauto);
$data = mysqli_fetch_array($hasil);
$kodemenu = $data['maxKode'];
$noUrut = (int) substr($kodemenu, 3, 3);
$noUrut++;
$char = "MN";
$kodemenu = $char . sprintf("%03s", $noUrut);

?>

<div class="container">
    <h3 class="text-center "><b>Form Data Menu Baru</b></h3>
    <div class="row">
        <div class="col">
            <div class="wrap">
                <div class="form-menu ">
                    <form method="post" action="menu_tambah_proses.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Kode Menu</label>
                            <input type="text" class="form-input" value="<?php echo $kodemenu ;?>" name="kode"
                                readonly="true">
                        </div>
                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" class="form-input" placeholder="Masukkan Nama Menu" name="menu" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-input" placeholder="Harga Menu" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-input" name="kategori">
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-input" name="gambar" required>
                        </div>

                        <button type="submit" class="tambah">Simpan</button>
                        <button type="reset" class="batal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>