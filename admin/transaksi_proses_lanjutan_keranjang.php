<?php
	include 'Connection.php';
	
	$kode_penjualan = $_POST['kode_penjualan'];
	$kode_menu = $_POST['kode_menu'];
	$jumlah_jual = $_POST['jumlah_jual'];
	
	$sqlSearchHarga = "SELECT harga FROM menu WHERE id_menu='$kode_menu'";
	$row = mysqli_query($conn, $sqlSearchHarga);
	$harga_buku = mysqli_fetch_array($row);
	
	$total = $jumlah_jual * $harga_buku[0];
	
	
	$sqlInsertDetTransPenjualan="INSERT INTO tbl_detailpenjualan (kode_penjualan,
														 kode_menu,
														 jumlah_jual,
														 total) 
												values 
														 ('$kode_penjualan',
														  '$kode_menu',
														  '$jumlah_jual',
														  '$total')";
	$ProccesInsert = mysqli_query($conn, $sqlInsertDetTransPenjualan);
	if ($ProccesInsert) {
		echo'<script type = "text/javascript">';
		echo 'window.location="transaksi_proses_lanjutan.php"';
		echo '</script>';
	}else {
		var_dump($sqlInsertDetTransPenjualan);
	}
	
?>