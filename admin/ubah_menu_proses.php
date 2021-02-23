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
                $lama =$_POST['foto_lama'];
                
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                        if($ukuran < 1044070){
                                unlink('img/'.$lama);			
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
       
        

        if (!empty($gambar)) {

                      
                $sql="UPDATE  menu  SET nama_menu ='$menu',kategori='$kategori',harga='$harga',gambar='$gambar' WHERE id_menu='$kode'";

                $result = mysqli_query($conn,$sql);                
                        if ($result>0) 
                        {
                        echo" <script>        alert('Data menu baru berhasil diubah');document.location.href='adminhome.php'; </script>";
                        }else{
                        echo" <script>        alert('Data Gagal diubah');        document.location.href='ubah_menu.php';        </script>        ";
                        }
        
        }else{

                $sql="UPDATE  menu  SET nama_menu ='$menu',kategori='$kategori',harga='$harga' WHERE id_menu='$kode'";

                $result = mysqli_query($conn,$sql);
                
                        if ($result>0) 
                        {
                        echo" <script>        alert('Data menu baru berhasil diubah');document.location.href='adminhome.php'; </script>";
                        }else{
                            echo" <script>        alert('Data Gagal diubah');        document.location.href='ubah_menu.php';        </script>        ";
                }
        }  
    
    ?>