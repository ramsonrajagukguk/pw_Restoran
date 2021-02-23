<?php
	include 'Connection.php';
	
    $id_menu=$_GET['id'];
    $sql="DELETE FROM menu WHERE id_menu='".$id_menu."'";

    $result = mysqli_query($conn,$sql);

    
    if ($result > 0) 
	{
        echo"
        <script>
        alert('Data menu berhasil Dihapus');
        document.location.href='adminhome.php';
        </script>
        ";
	}else{
        echo"
        <script>
        alert('Data menu  Gagal Dihapus');
        document.location.href='adminhome.php';
        </script>
        ";
	}

    ?>