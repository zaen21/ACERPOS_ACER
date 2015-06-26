<?php
include("koneksi.php");
?>

<?php
	session_start();
	if (!isset($_SESSION['nama'])) {
		header("Location:tampilan.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Anggota</title>
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
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Kasir <b class="caret"></b></a>
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

	<div class="hero-unit">

<center><h3>ACER (Anak Cerdas)</h3>

<table cellpadding="5" cellspacing="0" border="1">
	<tr bgcolor="#cccccc">
	<th colspan="8"><font size="6">DATA ANGGOTA ONLINEPOS ACER COLECTION</font></th>
	</tr>
<tr bgcolor="red">
	<th>No</th>
	<th>Nama</th>
	<th>Alamat</th>
	<th>No.Hp</th>
	<th>Email</th>
	<th>Level</th>
	</tr>
	</center>

	<?php
	include('koneksi.php');

	$query = "SELECT * FROM user";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		extract($row);
		?>
		<tr bgcolor="#ffffff">
			<td><?php echo $id_user ?></td>
			<td><?php echo $nama ?></td>
			<td><?php echo $alamat ?></td>
			<td><?php echo $nohp ?></td>
			<td><?php echo $email ?></td>
			<td><?php echo $level ?></td>
			</tr>
		<?php
	}
	?>
</table>
</div>
<footer>
        <center><p>Kelompok ACER (anak cerdas) &copy; 2015</p></center>
      </footer>
	<hr>
</body>
</html>