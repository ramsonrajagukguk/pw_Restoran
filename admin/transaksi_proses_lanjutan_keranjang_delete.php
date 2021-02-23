<?php
	include 'Connection.php';
	
	$kode_menu=$_GET['kode_menu'];
	
	$Query_delete="DELETE FROM tbl_detailpenjualan WHERE kode_menu='$kode_menu'";
	$Procces_Delete=mysqli_query($conn, $Query_delete);
	if ($Procces_Delete) {
		echo'<script type = "text/javascript">';
		echo 'window.location="transaksi_proses_lanjutan.php"';
		echo '</script>';
	}else{
		echo "Data Failed";
	}
?>