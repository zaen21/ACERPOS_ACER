<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<style type="text/css">
body{
	background-color: ;
}
		</style>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body background="DB/gambar1.jpg">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<center><a class="btn" href="#">ONLINE POS ACER</a></center>
					<a class="brand btn-primary" href="#home.php"><i class="icon icon-small icon-home icon-white"></i></a>
					<a class="brand" href="#"></a>
						<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
						<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
						<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
						<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
						<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
						<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
						<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
					<div class="nav-collapse collapse">
						<ul class="nav">
											<ul class="nav navbar-nav">
												<li><a href="#data_anggota_acer.php">Daftar Pengguna</a></li>
												<li><a href="#suplier_list.php">Data Suplier</a></li>
												<li><a href="#produk_list.php">Data Produk</a></li>
												<li><a href="#laporan.php">Laporan Transaksi</a></li>
											</ul>

										</ul>
						</ul>
						<div class="btn-group navbar-form pull-right">
							<li class="dropdown">
							<a class="btn btn-primary dropdown-toggle" type="submit" name="submit" data-toggle="dropdown" href="#"><i class="icon-user icon-white"></i>LOGIN<span class="caret"></span></a>
							<ul class="dropdown-menu">
							<form class="form-signin" method="post">
								<h2 class="form-signin-heading" align="center">Silahkan Login</h2>
									<input type="text" name="username" class="input-block-level" placeholder="username">
								<br/>
									<input type="password" name="password" class="input-block-level" placeholder="password">
									<center><button class="btn btn-large btn-primary" type="submit" name="submit">Signin</button></center>
							</form>

			<?php
				include ("koneksi.php");

				if (isset($_POST['submit'])){
					$username = $_POST['username'];
					$password = md5($_POST['password']);

					$sqlselect = "SELECT * FROM user WHERE username='$username' AND password='$password'";
					$result = mysqli_query ($koneksi, $sqlselect);
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

					if (mysqli_num_rows($result) == 1 ) {
						session_start();
						$_SESSION['nama'] = $row['nama'];
						$_SESSION['level'] = $row['level'];

						header("location: home.php");
					}else {
						echo "<div class='alert alert-danger' role='alert'> Login Gagal!!! Periksa kembali username password anda </div>";
					}
					
					mysqli_close($koneksi);
					
				}

			?>
			</ul>
			</li>

							</li>
						</div>
					</div>
				</div>
			</div>
		</div>
<hr>
      <footer>
        <center><p>Kelompok ACER (anak cerdas) &copy; 2015</p></center>
      </footer>

	<div class="container">
	       <div class="hero-unit">
									<center><h1><marquee scrollamount="15">Selamat Datang Online POS ACER</marquee></h1><br/>
										<p><img src="batas.gif" width="100%" class="img-rounded" height="100"></p>
										<hr>
												

										<div class="table-inverse">
						<ul class="table-inverse">
											<ul class="nav nav-table">
											<center><h2>Daftar Nama Kelompok</h2></center>
											<hr>
											<li><h4><a href="#">Ahmad Jaelani &copy; 1410651184</a></h4></li>
											<li><h4><a href="#">Anas Abdillah .M &copy; 1410651182</a></h4></li>
											<li><h4><a href="#">Alin Janahiq &copy; 1410651153</a></h4></li>
											<li><h4><a href="#">Adi Primadani &copy; 1410651016</a></h4></li>
											</ul>

								<hr>
								<footer>
        <center><p>Kelompok ACER &copy; 2015</p></center>
      </footer>
	
	        
	    </div>
    </div> 
      <hr>
	</body>
</html>
