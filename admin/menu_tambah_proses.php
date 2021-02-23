<?php 
    include 'Connection.php';

  
        $kode =$_POST["kode"];
        $menu =$_POST["menu"];
        $kategori =$_POST["kategori"];
        $harga =$_POST["harga"];
        $gambar=gambarupload();

           function gambarupload(){
                $ekstensi_diperbolehkan	= array('png','jpg');
                $nama = $_FILES['gambar']['name'];
                $x = explode('.', $nama);
                $ekstensi = strtolower(end($x));
                $ukuran	= $_FILES['gambar']['size'];
                $file_tmp = $_FILES['gambar']['tmp_name'];
                
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                        if($ukuran < 1044070){			
                                move_uploaded_file($file_tmp, 'img/'.$nama);
                                
                        }else{
                                echo"
                                <script>
                                alert('Ukuran file gambar harus 1 MB');
                                </script>
                                ";
                        }
                }else{
                        echo"
                        <script>
                        alert('Yang diupload bukan gambar');
                        </script>
                        ";
                }

                return $nama;
        }

        $sql="INSERT INTO menu  VALUES('$kode','$menu','$kategori','$harga','$gambar')";
        $result = mysqli_query($conn,$sql);
        


        if ($result>0) 
	{
        echo"
        <script>
        alert('Data menu baru berhasil ditambahkan');
        document.location.href='menu_tambah.php';
        </script>
        ";
	}else{
        echo"
        <script>
        alert('Data Gagal ditambahkan');
        document.location.href='menu_tambah.php';
        </script>
        ";
	}
   
    
    ?>