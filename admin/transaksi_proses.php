<?php
	include 'Connection.php';
	session_start();
	$kode_penjualan = $_POST['kode_penjualan'];
	$kode_petugas = $_POST['kode_petugas'];
	$nama_pembeli = $_POST['nama_pembeli'];

	$_SESSION['kode_transaksiPenjualan'] = $kode_penjualan;
	
	$sqlInsertTransPenjualan="INSERT INTO tbl_penjualan (	
															kode_penjualan,
														 	kode_petugas,
														 	tgl_penjualan,
														 	nama_pembeli
														) 
														values 
														(
															'$kode_penjualan',
														  	'$kode_petugas',
														  	NOW(),
														  	'$nama_pembeli'
														 )";
	$ProccesInsert = mysqli_query($conn, $sqlInsertTransPenjualan);
	if ($ProccesInsert) 
	{
		echo'<script type = "text/javascript">';
		echo 'window.location="transaksi_proses_lanjutan.php"';
		echo '</script>';
	}
	else 
	{
		var_dump($sqlInsertTransPenjualan);
	}
?>