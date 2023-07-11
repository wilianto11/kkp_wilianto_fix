<?php date_default_timezone_set("Asia/Jakarta");  ?>
	   <div class="row">
          <div class="col s12 m9">
            <h3 class="orange-text">Pengaduan</h3>
          </div>
        </div>

        <table id="example" class="display responsive-table" style="width:100%">
          <thead>
              <tr>
				<th>No</th>
				<th>NIDN</th>
				<th>Perangkat Daerah</th>
				<th>Kategori</th>
				<th>Judul</th>
				<th>Materi Pokok</th>
				<th>Naskah Akademis</th>
				<th>File Pendukung</th>
				<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengajuan INNER JOIN opd ON pengajuan.id_opd=opd.id_opd WHERE pengajuan.status='proses' ORDER BY pengajuan.id_pengajuan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['id_pengajuan']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['kategori']; ?></td>
			<td><?php echo $r['judul']; ?></td>
			<td><?php echo $r['materi']; ?></td>
			<td><a href="../doc/<?php echo $r['file_docx'];?>" target="_blank" class="text-center"><?php echo $r['file_docx']?></a></td>
			<td><a href="../pdf/<?php echo $r['file_pdf'];?>" target="_blank" class="text-center"><?php echo $r['file_pdf']?></a></td>
			<td><?php echo $r['status']; ?></td>
			<td><a class="btn modal-trigger blue" href="#more?id_pengajuan=<?php echo $r['id_pengajuan'] ?>">Detail</a>  <a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=pengajuan_hapus&id_pengajuan=<?php echo $r['id_pengajuan'] ?>">Hapus</a></td>

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="more?id_pengajuan=<?php echo $r['id_pengajuan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="blue-text">Detail</h4>
            <div class="col s12 m6">
				<p style="text-align: justify">NIDN : <?php echo $r['id_pengajuan']; ?></p>
            	<p>Perangkat Daerah  : <?php echo $r['nama']; ?></p>
				<p>Tanggal Pengajuan : <?php echo $r['tgl_pengajuan']; ?></p>
				<p>Kategori : <?php echo $r['kategori']; ?></p>
				<p>Judul : <?php echo $r['judul']; ?></p>
				<p>Materi : <?php echo $r['materi']; ?></p>
				<p>Target : <?php echo $r['target_tw']; ?></p>
				<p>Keterangan : <?php echo $r['keterangan']; ?></p>
				<p>Status : <?php echo $r['status']; ?></p>
            </div>
            <?php 
            	if($r['status']=="proses"){ ?>
	            <div class="col s12 m6">
					<form method="POST">
						<div class="col s12 input-field">
							<label for="textarea">Tanggapan</label>
							<textarea id="textarea" name="tanggapan" class="materialize-textarea"></textarea>
						</div>
						<div class="col s12 input-field" >
							<input type="submit" name="terima" value="Terima" class="btn right green">
						</div>
						<div class="col s12 input-field" >
							<input type="submit" name="tolak" value="Tolak" class="btn right red">
						</div>
					</form>
	            </div>
            <?php	}
             ?>

			<?php 
				if(isset($_POST['terima'])){
					$tgl = date('Y-m-d H:i:s');
					$query = mysqli_query($koneksi,"INSERT INTO tanggapan VALUES (NULL,'".$r['id_pengajuan']."','".$tgl."','".$_POST['tanggapan']."','".$_SESSION['data']['id_admin']."')");
					if($query){
						$update=mysqli_query($koneksi,"UPDATE pengajuan SET status='terima' WHERE id_pengajuan='".$r['id_pengajuan']."'");
						if($update){
							echo "<script>alert('Tanggapan Terkirim')</script>";
							echo "<script>location='index.php?p=pengajuan';</script>";
						}
					}
				}
			 ?>
			 <?php 
				if(isset($_POST['tolak'])){
					$tgl = date('Y-m-d H:i:s');
					$query = mysqli_query($koneksi,"INSERT INTO tanggapan VALUES (NULL,'".$r['id_pengajuan']."','".$tgl."','".$_POST['tanggapan']."','".$_SESSION['data']['id_admin']."')");
					if($query){
						$update=mysqli_query($koneksi,"UPDATE pengajuan SET status='tolak' WHERE id_pengajuan='".$r['id_pengajuan']."'");
						if($update){
							echo "<script>alert('Tanggapan Terkirim')</script>";
							echo "<script>location='index.php?p=pengajuan';</script>";
						}
					}
				}
			 ?>
          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>        