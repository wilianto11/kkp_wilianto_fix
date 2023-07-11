        <div class="row">
          <div class="col s12 m9">
            <h3 class="orange-text">Respon</h3>
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
				<th>Status</th>
				<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengajuan INNER JOIN opd ON pengajuan.id_opd=opd.id_opd INNER JOIN tanggapan ON pengajuan.id_pengajuan=tanggapan.id_pengajuan INNER JOIN admin ON tanggapan.id_admin=admin.id_admin WHERE tanggapan.id_admin='".$_SESSION['data']['id_admin']."' ORDER BY tanggapan.id_pengajuan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['id_pengajuan']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['kategori']; ?></td>
			<td><?php echo $r['judul']; ?></td>
			<td><?php echo $r['materi']; ?></td>
			<td><?php echo $r['file_docx']; ?></td>
			<td><?php echo $r['file_pdf']; ?></td>
			<td><?php echo $r['status']; ?></td>
			<td><a class="btn blue modal-trigger" href="#more?id_tanggapan=<?php echo $r['id_tanggapan'] ?>">Detail</a> <a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=tanggapan_hapus&id_tanggapan=<?php echo $r['id_tanggapan'] ?>">Hapus</a></td>
		

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="more?id_tanggapan=<?php echo $r['id_tanggapan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="orange-text">Detail</h4>
            <div class="col s12">
			<p style="text-align: justify">NIDN : <?php echo $r['id_pengajuan']; ?></p>
            	<p>Perangkat Daerah  : <?php echo $r['nama']; ?></p>
				<p>Tanggal Pengajuan : <?php echo $r['tgl_pengajuan']; ?></p>
				<p>Tanggal ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
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
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>        