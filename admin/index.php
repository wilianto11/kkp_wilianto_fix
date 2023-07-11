<?php 
	session_start();
	include '../conn/koneksi.php';
	if(!isset($_SESSION['username'])){
		header('location:../index.php');
	}
	elseif($_SESSION['data']['level'] != "admin"){
		header('location:../index.php');
	}
 ?>
  <!DOCTYPE html>
  <html>
    <head>
    	<title>Aplikasi Pengaduan masyarakat</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
      
      
      <script type="text/javascript">
        $(document).ready( function () {
          $('#example').DataTable();
          $('select').formSelect();
        } );
      
      </script>

    </head>


    <div class="row">
      <div class="col s12 m3">
          <ul id="slide-out" class="sidenav sidenav-fixed">
              <li>
                  <div class="user-view">
                      <div class="background">
                      </div>
                      <a href="#user"><img class="circle" src="data:image/png;base64,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"></a>
                      <a href="#name"><span class="blue-text name"><?php echo ucwords($_SESSION['data']['nama_admin']); ?></span></a><?php echo date('l, d-m-Y');?>  
					  
                  </div>
              </li>
              <li><a href="index.php?p=dashboard"><i class="material-icons">dashboard</i>Dashboard</a></li>
              <li><a href="index.php?p=registrasi"><i class="material-icons">featured_play_list</i>Registrasi</a></li>
              <li><a href="index.php?p=pengaduan"><i class="material-icons">report</i>list Pengajuan</a></li>
              <li><a href="index.php?p=respon"><i class="material-icons">question_answer</i>Respon</a></li>
              <li><a href="index.php?p=user"><i class="material-icons">account_box</i>User</a></li>
              <li><a href="index.php?p=laporan"><i class="material-icons">book</i>Laporan</a></li>
              <li>
                  <div class="divider"></div>
              </li>
              <li><a class="waves-effect" href="../index.php?p=logout"><i class="material-icons">logout</i>Logout</a></li>
          </ul>

          <a href="#" data-target="slide-out" class="btn sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>

      <div class="col s12 m9">
        
	<?php 
		if(@$_GET['p']==""){
			include_once 'dashboard.php';
		}
		elseif(@$_GET['p']=="dashboard"){
			include_once 'dashboard.php';
		}
		elseif(@$_GET['p']=="registrasi"){
			include_once 'registrasi.php';
		}
		elseif(@$_GET['p']=="regis_hapus"){
			$query = mysqli_query($koneksi,"DELETE FROM masyarakat WHERE nik='".$_GET['nik']."'");
			if($query){
				header('location:index.php?p=registrasi');
			}
		}
		elseif(@$_GET['p']=="pengaduan"){
			include_once 'pengaduan.php';
		}
		elseif(@$_GET['p']=="pengaduan_hapus"){
			$query=mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
			$data=mysqli_fetch_assoc($query);
			unlink('../img/'.$data['foto']);
			if($data['status']=="proses"){
				$delete=mysqli_query($koneksi,"DELETE FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
				header('location:index.php?p=pengaduan');
			}
			elseif($data['status']=="selesai"){
				$delete=mysqli_query($koneksi,"DELETE FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
				if($delete){
					$delete2=mysqli_query($koneksi,"DELETE FROM tanggapan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
					header('location:index.php?p=pengaduan');
				}	
			}

		}
		elseif(@$_GET['p']=="more"){
			include_once 'more.php';
		}
		elseif(@$_GET['p']=="respon"){
			include_once 'respon.php';
		}
		elseif(@$_GET['p']=="tanggapan_hapus"){
			
			$query = mysqli_query($koneksi,"DELETE FROM tanggapan WHERE id_tanggapan='".$_GET['id_tanggapan']."'");
			if($query){
				header('location:index.php?p=respon');
			}
		}
		elseif(@$_GET['p']=="user"){
			include_once 'user.php';
		}
		elseif(@$_GET['p']=="user_input"){
			include_once 'user_input.php';
		}
		elseif(@$_GET['p']=="user_edit"){
			include_once 'user_edit.php';
		}
		elseif(@$_GET['p']=="user_hapus"){
			$query = mysqli_query($koneksi,"DELETE FROM petugas WHERE id_petugas='".$_GET['id_petugas']."'");
			if($query){
				header('location:index.php?p=user');
			}
		}
		elseif(@$_GET['p']=="laporan"){
			include_once 'laporan.php';
		}
	 ?>

      </div>


    </div>




      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          var instances = M.Sidenav.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modal');
          var instances = M.Modal.init(elems);
        });

      </script>

    </body>
  </html>