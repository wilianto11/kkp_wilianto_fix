<?php 
$id_opd = $_SESSION['data']['id_opd'];
?>
<table class="responsive-table" border="2" style="width: 100%;">
	<tr>
    <td><h4 class="orange-text hide-on-med-and-down">Daftar Laporan</h4></td>
	</tr>
	
			<table border="3" class="responsive-table striped highlight">
	</tr>
				<tr>
					<td>No</td>
					<th>NIDN</th>
					<th>Perangkat Daerah</th>
					<th>Kategori</th>
					<th>Judul</th>
					<th>Materi Pokok</th>
					<th>Naskah Akademis</th>
					<th>File Pendukung</th>
					<td>Status</td>
					<td>Opsi</td>
				</tr>
				<?php 
					$no=1;
					$pengaduan = mysqli_query($koneksi,"SELECT * FROM pengajuan INNER JOIN opd ON pengajuan.id_opd=opd.id_opd INNER JOIN tanggapan ON pengajuan.id_pengajuan=tanggapan.id_pengajuan WHERE pengajuan.id_opd='".$_SESSION['data']['id_opd']."' ORDER BY pengajuan.id_pengajuan DESC");
					while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $r['id_pengajuan']; ?></td>
						<td><?php echo $r['nama']; ?></td>
						<td><?php echo $r['kategori']; ?></td>
						<td><?php echo $r['judul']; ?></td>
						<td><?php echo $r['materi']; ?></td>
						<td><a href="download.php?file=<?php echo $r['file_docx'];?>" class="text-center"><?php echo $r['file_docx']?></a></td>
						<td><a href="download.php?file=<?php echo $r['file_pdf'];?>" class="text-center"><?php echo $r['file_pdf']?></a></td>
						<td><?php echo $r['status']; ?></td>
						<td>
							<a class="btn blue modal-trigger" href="#tanggapan&id_pengajuan=<?php echo $r['id_pengajuan'] ?>">More</a> 
							<a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=pengajuan_hapus&id_pengajuan=<?php echo $r['id_pengajuan'] ?>">Hapus</a></td>

<!-- ditanggapi -->
        <div id="tanggapan&id_pengajuan=<?php echo $r['id_pengajuan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="orange-text">Detail</h4>
            <div class="col s12">
			<p style="text-align: justify">NIDN : <?php echo $r['id_pengajuan']; ?></p>
            	<p>Perangkat Daerah  : <?php echo $r['nama']; ?></p>
				<p>Tanggal Pengajuan : <?php echo $r['tgl_pengajuan']; ?></p>
				<p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
				<p>Kategori : <?php echo $r['kategori']; ?></p>
				<p>Judul : <?php echo $r['judul']; ?></p>
				<p>Materi : <?php echo $r['materi']; ?></p>
				<p>Target : <?php echo $r['target_tw']; ?></p>
				<p>Keterangan : <?php echo $r['keterangan']; ?></p>
				<p>Status : <?php echo $r['status']; ?></p>
				<p>Catatan : <?php echo $r['tanggapan']; ?></p>
            </div>

          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<!-- ditanggapi -->

					</tr>
				<?php	}
				 ?>
			</table>

		</td>
	</tr>
</table>