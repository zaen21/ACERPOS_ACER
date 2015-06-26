<?php
include("koneksi.php");
$kode_brg=$_GET['kode_brg'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
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
		$queryselect= "SELECT * FROM produk WHERE kode_brg='$kode_brg'";
		$result= mysqli_query($koneksi, $queryselect);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if (mysqli_num_rows($result)==0){
			echo '<center><h2><font color="red">data tidak ditemukan.</center></h2></font>';
		}else{
	?>
	<hr>
	<footer>
        <center><p>Kelompok ACER &copy; 2015</p></center>
      </footer>
	<div class="container">
	<div class="hero-unit">
	<center>
	<h3>FORM EDIT DATA PELANGGAN</h3>
		<table>
			<tr>
				<td>KODE</td>
				<td>:</td>
				<td><input type="number" name="kode_brg" value="<?php echo $row['kode_brg']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>MERK</td>
				<td>:</td>
				<td><input type="text" name="merk" value="<?php echo $row['merk']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>STOK</td>
				<td>:</td>
				<td><input type="number" name="stok" value="<?php echo $row['stok']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type="number" name="harga" value="<?php echo $row['harga']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td colspan=3 align="center"><input type="submit" name="submit"/>
				<input type="button" value="cancel" onclick="window.location='produk_list.php'">
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
			$kode = $_POST['kode_brg'];
			$merk = $_POST['merk'];
			$stok = $_POST['stok'];
			$harga = $_POST['harga'];

			$queryupdate = "UPDATE produk SET kode_brg='$kode_brg', merk='$merk', 
							 stok='$stok', harga='$harga' WHERE kode_brg='$kode_brg'";
			
			if (mysqli_query($koneksi, $queryupdate)){
				echo "data has been updated succesfully";
				header("Location: produk_list.php");
			}else{
				echo "error: ". $queryupdate . "<br/>". mysqli_error($koneksi);
			}
			
			mysqli_close($koneksi);
		}
?>
</body>
</html>
