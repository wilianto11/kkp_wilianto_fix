<?php
// Downloads files
// Tentukan folder file yang boleh di download
$folder = "doc/";
$filename = $_GET['file'];
$file_extension = strtolower(substr(strrchr($filename,"."),1));
// Lalu cek menggunakan fungsi file_exist
if (!file_exists($folder.$_GET['file'])) {
 echo "<h1>Access forbidden!</h1>
 <p>File Sudah Tidak Ada</p>";
 exit;
}
// Apabila mendownload file di folder 
else {
 header("Content-Disposition: attachment; filename=".basename($filename));
 header("Content-Type: application/octet-stream;");
 readfile("doc/".$filename);
}
?>