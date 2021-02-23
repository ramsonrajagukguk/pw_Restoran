<?php
include 'header.php';
?>

<?php
 $id_menu=$_GET['id'];
 $result = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu= '$id_menu'");

 
//  if(mysqli_num_rows($result) == 0){
  
//     //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
//     echo '<script>window.history.back()</script>';
    
//    }else{
   
    //jika data ditemukan, maka membuat variabel $data
    $data = mysqli_fetch_assoc($result); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
   
//    }


?>

<div class="container">
    <h3 class="text-center "><b>Form Ubah Menu</b></h3>
    <div class="row">
        <div class="col">
            <div class="wrap">
                <div class="form-menu ">
                    <form method="post" action="ubah_menu_proses.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Kode Menu</label>
                            <input type="text" class="form-input" name="kode" value="<?php echo $data['id_menu'];?>"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" class="form-input" value="<?php echo $data['nama_menu'];?>" name="menu"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-input" value="<?php echo $data['harga'];?>" name="harga"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-input" name="kategori">
                                <option value="<?php echo $data['kategori'];?>"><?php echo $data['kategori'];?></option>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-input" name="gambar">
                        </div>

                        <input type="hidden" name="foto_lama" value="<?php echo $data['gambar'];?>">

                        <button type="submit" class="tambah">Ubah</button>
                        <a href="adminhome.php" type="reset" class="batal">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include 'footer.php';
?>