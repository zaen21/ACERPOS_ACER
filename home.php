<?php
	session_start();

	if (!isset($_SESSION['nama'])) {
		header("Location: tampilan.php");
	}
?>
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
	background-color: blue;
}
		</style>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand btn-primary" href="home.php"><i class="icon icon-small icon-home icon-white"></i><=BERANDA</a>
					<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
					<a class="brand" href="#">ONLINE POS ACER</a>
					<div class="nav-collapse collapse">
					<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
					<a class="brand" href="#"></a>
						<ul class="nav">
							<?php
								if ($_SESSION['level'] == "admin") {
									echo '
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">MENU ADMIN <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="data_anggota_acer.php">Daftar Pengguna</a></li>
												<li><a href="suplier_list.php">Data Suplier</a></li>
												<li><a href="produk_list.php">Data Produk</a></li>
												<li><a href="laporan.php">Laporan Transaksi</a></li>
											</ul>
										</li>
									';
								}else if($_SESSION['level'] == "kasir") {
									echo '
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">MENU KASIR <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="produk_kasir.php">Transaksi Penjualan</a></li>
												<li><a href="data_anggota_acer_kasir.php">Daftar Pengguna</a></li>
												<li><a href="laporan.php">Laporan</a></li>
											</ul>
										</li>
									';
								}
							?>

						</ul>
						<div class="btn-group navbar-form pull-right">
							<a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i> <?php echo $_SESSION['nama']; ?></a>
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="logout.php"><i class="icon-off"></i> Logout </a></li>
							</ul>
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
	        <?php
								if ($_SESSION['level'] == "admin") {
									echo '
									<center><h1>Selamat Datang Admin!</h1><br/>
										<p><img src="batas.gif" width="100%" class="img-rounded" height="100"></p>
										<hr>
									<div class="row">
          									<div class="span5">
            								<h2>Data Angoota ACER</h2>
             								<p><a href="data_anggota_acer.php"><img src="user.png" width="50%" class="img-rounded" height="50"></a></p>
            								
          								</div>
          									<div class="span5">
            								<h2>Data Suplier</h2>
             								<p><a href="suplier_list.php"><img src="suplier.png" width="50%" class="img-rounded" height="50"></a></p>
            								
          								</div>
          								</div>
          							
<hr>
          							<div class="row">
          									<div class="span5">
            								<h2>Data Produk/Barang</h2>
             								<p><a href="produk_list.php"><img src="jual.png" width="50%" class="img-rounded" height="50"></a></p>
            								
            							</div>
            								<div class="span5">
            								<h2>Laporan Hasil</h2>
             								<p><a href="laporan.php"><img src="laporan.png" width="50%" class="img-rounded" height="50"></a></p>
            								
            								</div>
            							</div>
            							</center>
            							<hr>
									';
								}else if($_SESSION['level'] == "kasir") {
									echo '
										<center><h1>Selamat Datang Kasir!</h1><br/>
										<p><img src="batas.gif" width="100%" class="img-rounded" height="100"></p>
										<hr>
										<div class="row">
          									<div class="span5">
            								<h2>Data Penjualan</h2>
             								<p><a href="produk_kasir.php"><img src="dollar.png" width="50%" class="img-rounded" height="50"></a></p>
            								
          								</div>
          									<div class="span5">
            								<h2>Data Anggota ACER</h2>
             								<p><a href="data_anggota_acer_kasir.php"><img src="user.png" width="50%" class="img-rounded" height="50"></a></p>
            								
          								</div>
          								</div>
          								<hr>
          								<div class="row">
          									<div class="span5">
            								<h2>Laporan Penjualan</h2>
             								<p><a href="laporan.php"><img src="laporan.png" width="50%" class="img-rounded" height="50"></a></p>
            								
          								</div>
          								</div>
          								</center>
									';
								}
							?> 
	        
	    </div>
    </div> 
      <footer>
        <center><p>Kelompok ACER (anak cerdas) &copy; 2015</p></center>
      </footer>
      <hr>
	</body>
</html>
