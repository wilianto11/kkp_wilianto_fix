<?php 
$id_opd = $_SESSION['data']['id_opd'];
// mengambil data barang dari tabel dengan kode terbesar
$query = mysqli_query($koneksi, "SELECT max(id_pengajuan) as kodeTerbesar FROM pengajuan");
$data = mysqli_fetch_array($query);
$kodeDokumen = $data['kodeTerbesar'];
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeDokumen, 3, 3);
// nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
// membuat kode barang baru
// string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter
// misalnya string sprintf("%03s", 22); maka akan menghasilkan '022'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya PC
$huruf = "NID";
$kodeDokumen = $huruf . sprintf("%03s", $urutan);
?>
    	<marquee><h3 class="red-text hide-on-med-and-down" >Aplikasi Program Pembentukan Peraturan Daerah</h3></marquee>
		<div class="divider"></div>
<table class="responsive-table" border="2" style="width: 40%;">
	<tr>
		<td><h4 class="orange-text hide-on-med-and-down">Formulir Pengajuan</h4></td>
	</tr>
	<tr>
		<td style="padding: 20px;">
			<form action="tambah.php" method="post" name="form1" enctype="multipart/form-data">
			<label>NIDN</label>
       		 <input type="text" class="form-control" placeholder="NIDN" name="id_pengajuan" value="<?php echo $kodeDokumen ?>" readonly required="required"> <br>  
            <input type="hidden" name="id_opd" class="form-control" value="<?php echo $id_opd;?>" required>     
        	<label>Kategori</label>
            <select class="form-control" name="kategori">
                <option>Perubahan Rancangan Peraturan Daerah</option>
                <option>Rancangan Peraturan Daerah Baru </option>
            </select><br>
        	<label>Judul</label>
        	<input type="text" name="judul" class="form-control" >
        	<label>Materi Pokok</label>
              <input type="text" name="materi" class="form-control">
              <label for="file"> File Naskah Akademis </label>: .docx <br>
              <input type="file" name="file"  /><br>
              <label for="file">  File Pendukung </label>: .pdf<br>
              <input type="file" name="file_1" /> <br>
              <label>Target</label>
              <select class="form-control" name="target_tw">
                <option>TW.1</option>
                <option>TW.2</option>
                <option>TW.3</option>
                <option>TW.4</option>
              </select>
              <label>Keterangan</label>  
              <select class="form-control" name="keterangan">
                <option>Baru</option>
                <option>Rutin</option>
                <option>Usulan Sebelumnya</option>
              </select>
				<input type="submit" name="Submit" value="kirim" class="btn">
			</form>
		</td>
	</tr>
</table>

<footer>
  <p>Design By Wilianto <a href="https://github.com/wilianto11">https://github.com/wilianto11</a></p>
</footer>
