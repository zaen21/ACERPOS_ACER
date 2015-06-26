<!DOCTYPE html>
<html>
	<head>
		<title>Registrasi Acer</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>

		<div class="container">

      	<div class="hero-unit">
	  
	  <h2>Form Pendaftaran</h2>
	  <form class="form-horizontal" method="post">
	  	<div class="control-group">
	  		<label class="control-label">Nama</label>
	  		<div class="controls"><input type="text" name="nama" placeholder="Nama"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">Alamat</label>
	  		<div class="controls"><input type="text" name="alamat" placeholder="Alamat"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">NoHp/Telp</label>
	  		<div class="controls"><input type="number" name="nohp" placeholder="NoHp/Telp"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">email</label>
	  		<div class="controls"><input type="email" name="email" placeholder="email anda"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">Username</label>
	  		<div class="controls"><input type="text" name="username" placeholder="Username"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">Password</label>
	  		<div class="controls"><input type="password" name="password" placeholder="Password"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">Level User</label>
	  		<div class="controls">
	  			<select name="level">
	  			<option></option>
	  				<option values="kasir">kasir</option>
	  				<option values="admin">admin</option>
	  			</select>
	  		</div>
	  </div>
	  <div class="control-group">
	  	<div class="controls">
	  		<button type="submit" class="btn bt-info" name="submit">Submit</button>
	  		<input type="button" class="btn" value="cancel" onclick="window.location='data_anggota_acer.php'">
	  	</div>
	  </div>
	  </form>
	  </div>
	  </div>



<?php 
	include ("koneksi.php");

	if(isset($_POST['submit'])){
		$nama = $_POST['nama'];
		$alamat=$_POST['alamat'];
		$nohp=$_POST['nohp'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$level=$_POST['level'];

		$sqlinsert = "INSERT INTO user (nama, alamat, nohp, email, username, password, level) values ('$nama','$alamat','$nohp','$email','$username','$password','$level')";
		if (mysqli_query($koneksi, $sqlinsert)){
			echo "New record created successfully";
			echo '<META http-equiv="refresh" content="1;URL=data_anggota_acer.php">';
		}	else {
			echo "Error: " . $sqlinsert . "<br>" . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
	}
?>

      </div>
    </div> 
	</body>
</html>
