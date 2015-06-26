<?php
include("koneksi.php");
$kode_brg =$_GET['kode_brg'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>BELI / PENJUALAN</title>
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
	<form method="post">
	<?php
		$queryselectp= "SELECT * FROM produk WHERE kode_brg='$kode_brg'";
		$resultp= mysqli_query($koneksi, $queryselectp);
		$row = mysqli_fetch_array($resultp, MYSQLI_ASSOC);

		if (mysqli_num_rows($resultp)==0){
			echo '<center><h2><font color="red">data tidak ditemukan.</center></h2></font>';
		}else{
	?>
	<hr>
	<div class="container">
	<div class="hero-unit">
		
	<center><h3>FORM PENJUALAN</h3>
		<table>
			<tr>
				<td>NAMA BARANG</td>
				<td> : </td>
				<td><input type="text" name="merk" value="<?php echo $row['merk']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>HARGA SATUAN</td>
				<td> : </td>
				<td><input type="number" name="harga_satuan" value="<?php echo $row['harga']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>JUMLAH PEMBELIAN</td>
				<td> : </td>
				<td><input type="number" name="jumlah_transaksi" size="50"/></td>
			</tr>
			<tr>
				<td colspan=3 align="center"><input type="submit" value="beli" name="submit"/> 
				<input type="button" value="cancel" onclick="window.location='produk_kasir.php'">

				</td>
			</tr>
		</table>
		</center>
		</div>
		</div>	
		<footer>
        <center><p>Kelompok ACER &copy; 2015</p></center>
      </footer>
      <hr>
	</form>
	<?php
		}
		if(isset($_POST['submit'])){
			$merk = $_POST['merk'];
			$jumlah_transaksi = $_POST['jumlah_transaksi'];
			$harga_satuan = $_POST['harga_satuan'];

			$queryupdatep = "UPDATE produk SET stok=stok-$jumlah_transaksi WHERE kode_brg='$kode_brg'";
			$queryinsert= "INSERT INTO laporan(tgl_transaksi, merk, harga_satuan, jumlah_transaksi, total_harga) 
							VALUES (now(), '$merk', $harga_satuan, $jumlah_transaksi, $harga_satuan*$jumlah_transaksi)";
			
			if (mysqli_query($koneksi, $queryupdatep) && mysqli_query($koneksi, $queryinsert)){
				echo "data has been updated succesfully";
				header("Location: produk_kasir.php");
			}else{
				echo "error: ". $queryupdatep . "<br/>". mysqli_error($koneksi);
			}
			
			mysqli_close($koneksi);
		}
?>
</body>
</html>
