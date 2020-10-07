<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h2>Form edit data</h2>    
<form>
    <?php
        include "koneksi.php";
        if(isset($_GET['sub']))
            $x = $_GET['idnya'];
        else    
            $x = $_GET['id'];
        
    ?>
    nama: <input type="text" name="nm" value="<?php 
         if(isset($_GET['sub'])){
             echo $_GET['nm'];
         }
         else{     
            $r = mysqli_query($kon,"SELECT * FROM mahasiswa WHERE id=$x");
            $brs = mysqli_fetch_assoc($r);        
            echo $brs['nama'];
            }
        ?>">
    <input type="submit" name="sub" value="simpan hasil pengubahan!">
    <input type="submit" name="sub" value="kembali ke daftar data">
    <input type="hidden" name="idnya" value="<?php echo $x; ?>">
    <?php
        if(isset($_GET['sub']) ){
            if($_GET['sub']=='kembali ke daftar data'){
                header("location:tampil_data.php");
            }
            else{
              if(strlen($_GET['nm'])){    
                //include "koneksi.php"; //di atas sudah ya
                mysqli_query($kon,"UPDATE `mahasiswa` SET `nama` = '".$_GET['nm']."' 
                                   WHERE `id` = ".$_GET['idnya']);
                echo "<br>Data <b>'".$_GET['nm']."'</b> telah disimpan sebagai perubahan pada database";
                echo "<br>silahkan klik tombol kembali ke daftar data untuk melihat hasilnya";
                //header("location:tampil_data_link_insert.php");
              }
             else{
                 echo "Data nama baru tidak boleh kosong :)";
             }    
            }
        }
    ?>
</form>

</body>
</html>