<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h2>Form tambah data baru</h2>    
<form>
    <h2>Form tambah data baru</h2>    
<form>
    nama: <input type="text" name="nm">
    <input type="submit" name="sub" value="simpan data baru!">
    <input type="submit" name="sub" value="kembali ke daftar data">
    <?php
        if(isset($_GET['sub'])){
            if($_GET['sub']=='kembali ke daftar data'){
                header("location:tampil_data.php");
            }
            else{
              if(strlen($_GET['nm'])){    
                include "koneksi.php";
                mysqli_query($kon,"INSERT INTO `mahasiswa` (`nama`) VALUES ('".$_GET['nm']."')");
                echo "<br>Data <b>'".$_GET['nm']."'</b> telah dimasukan ke database";
                echo "<br>silahkan klik tombol kembali ke daftar data untuk melihat hasilnya";
                //header("location:tampil_data_link_insert.php");
              }
              else{
                  echo "Agar data tersimpan, nama tidak boleh kosong :)";
              }    
             }
        }
    ?>
</form>
</form>

</body>
</html>