<?php
include 'header.php';
?>

<?php

$halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

    $ql =("SELECT * FROM menu");
    $result =  mysqli_query($conn,$ql);
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);            
    $result = mysqli_query($conn,"select * from menu LIMIT $mulai, $halaman");
    $no =$mulai+1;
 
    // $ql =("SELECT * FROM menu");
    // $result =  mysqli_query($conn,$ql);

    // Jika tombal cari di tekan
    $txt_cari = "";
    if(isset($_POST['cari']))
    {
      $txt_cari = $_POST['cari'];
    }

    $sql = "SELECT * FROM menu WHERE nama_menu LIKE '%".$txt_cari."%' OR id_menu LIKE '%".$txt_cari."     %' OR kategori LIKE '%".$txt_cari."%' OR harga LIKE '%".$txt_cari."%' ";
    $result = $conn->query($sql);
    ?>

<div class="container">
    <h3 class="text-center "><b>DAFTAR MENU MAKANAN DAN MINUMAN</b></h3>
    <a href="menu_tambah.php">
        <input type="submit" name="" value="Tambah Daftar" class="btn4" />
    </a>
    <form method="post" action="">
        <input type="text" name="cari" id="cari" class="textbox" placeholder="Cari Menu" autofocus autocomplete="off"
            required="">
        <button title="Search" name="submit" id="submit" value="" type="submit" class="btn btn-primary">Cari
        </button>
    </form>
</div>

<br>
<div class="container">
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            <?php while($data = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $i; ?></th>
                <td> <img class="gambar-menu" src="img/<?php echo $data['gambar']; ?>" alt=""> </td>
                <td><?php echo $data['nama_menu']; ?></td>
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['harga']; ?></td>
                <td>

                    <a href="ubah_menu.php?id=<?php echo $data['id_menu'];?>" class="btn-ubah">ubah</a>
                    <a href="hapus_menu.php?id=<?php echo $data['id_menu'];?>" class="btn-hapus">Hapus</a>
                </td>
            </tr>
            <?php  $i++; ?>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';
?>