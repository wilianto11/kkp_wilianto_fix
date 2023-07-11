
<div class="card" style="padding: 80px; width: 100%; margin: 0 auto; margin-top: 5%;">
<h3 style="text-align: center;" class="green-text">Aplikasi Program Pembentukan Peraturan Daerah Kabupaten Bekasi</h3>
<br><center><p>LOGIN!</a></p></center>

	<form method="POST">
		<div class="input_field" style="margin:auto; width: 40%; ">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field" style="margin:auto; width: 40%; ">
			<label for="password">Passowrd</label>
			<input id="password" type="password" name="password" required>
		</div>
		<center><input type="submit" name="login" value="Login" class="btn blue" style="width: 20%;"></center>
	</form>
</div>
<?php 
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi,$_POST['username']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
	
		$sql = mysqli_query($koneksi,"SELECT * FROM opd WHERE username='$username' AND password='$password' ");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['data']=$data;
			$_SESSION['level']='opd';
			header('location:opd/');
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:admin/');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('Gagal Login Sob')</script>";
		}

	}
 ?>