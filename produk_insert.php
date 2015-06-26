<?php
	session_start();
	if (!isset($_SESSION['nama'])) {
		header("Location:tampilan.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ADD SUPLIER</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
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
					<a class="brand" href="#">    </a>
					<a class="brand" href="#">ONLINE POS ACER</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<?php
								if ($_SESSION['level'] == "admin") {
									echo '
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Admin <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="user_list.php">Daftar Pengguna</a></li>
												<li><a href="suplier_list.php">Data Suplier</a></li>
												<li><a href="produk_list.php">Data Produk</a></li>
												<li><a href="laporan.php">Laporan Transaksi</a></li>
											</ul>
										</li>
									';
								}else if($_SESSION['level'] == "kasir") {
									echo '
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Kasir <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#">Transaksi Penjualan</a></li>
												<li><a href="#">Data Produk</a></li>
												<li><a href="#">Laporan</a></li>
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
<hr><hr>

		<div class="container">
      <div class="hero-unit">
	  
	  <h2>Tambah Data Produk</h2>
	<form class="form-horizontal" method="post">
	  	<div class="control-group">
	  		<label class="control-label">Nama Barang</label>
	  		<div class="controls"><input type="text" name="merk" placeholder="Nama Barang"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">Id Suplier</label>
	  		<div class="controls"><input type="number" name="id_suplier" placeholder="Id Suplier"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">Stok</label>
	  		<div class="controls"><input type="number" name="stok" placeholder="Stok"></div>
	  	</div>
	  	<div class="control-group">
	  		<label class="control-label">Harga Satuan</label>
	  		<div class="controls"><input type="number" name="harga" placeholder="Harga Satuan"></div>
	  	</div>
		<div class="control-group">
	  	<div class="controls">
	  		<button type="submit" class="btn bt-info" name="submit">Submit</button>
	  	</div>
	 	</div>
	 </form>



<?php 
	include ("koneksi.php");

	if(isset($_POST['submit'])){
		$merk=$_POST['merk'];
		$id_suplier=$_POST['id_suplier'];
		$stok=$_POST['stok'];
		$harga=$_POST['harga'];

		$sqlinsert = "INSERT INTO produk (merk, id_suplier, stok, harga) values ('$merk', '$id_suplier','$stok','$harga')";
		if (mysqli_query($koneksi, $sqlinsert)){
			echo "New record created successfully";
			echo '<META http-equiv="refresh" content="1;URL=produk_list.php">';
		}	else {
			echo "Error: " . sqlinsert . "<br>" . mysqli_error($koneksi);
		}
		mysqli_close($koneksi);
	}
?>

      </div>
    </div> 
	</body>
</html>
