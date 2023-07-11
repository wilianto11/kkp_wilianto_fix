<?php
	include "../conn/koneksi.php";
if(isset($_POST['Submit'])) {
    $id_pengajuan = $_POST['id_pengajuan'];
    $id_opd = $_POST['id_opd'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $materi = $_POST['materi'];
    $target_tw = $_POST['target_tw'];
    $keterangan = $_POST['keterangan'];
    $stt = "proses";
   $filename = $_FILES['file']['name'];
   $filetempname = $_FILES['file']['tmp_name'];
   $path = "../doc/$filename";
   $filename_1 = $_FILES['file_1']['name'];
   $filetempname_1 = $_FILES['file_1']['tmp_name'];
   $path_1 = "../pdf/$filename_1";
 

   $query = "INSERT INTO pengajuan(id_pengajuan,id_opd,kategori,judul,materi,file_docx,file_pdf,target_tw,keterangan,status) 
   VALUES ('$id_pengajuan','$id_opd','$kategori','$judul','$materi','$filename','$filename_1','$target_tw','$keterangan','$stt')";
   $run=mysqli_query($koneksi,$query);
   if($run){
     move_uploaded_file($filetempname,$path);
     move_uploaded_file($filetempname_1,$path_1);
     header("location:index.php?alert=berhasil");
   } else {
     echo "error".mysqli_error($koneksi);
   }
}

   ?>

	