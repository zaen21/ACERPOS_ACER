<?php
include("koneksi.php");
$kode_brg=$_GET['kode_brg'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
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
	<center><h4>apakah anda yakin akan menghapus data ini?</h4>
		<table>
			<tr>
				<td>NAMA BARANG</td>
				<td> : </td>
				<td><input type="text" name="merk" disabled value="<?php echo $row['merk']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td colspan=3 align="center">
					<input type="submit" name="submit"/>
					<input type="button" value="cancel" onclick="window.location='produk_list.php'">

				</td>
			</tr>
		</table>
		</center>
		</div>
		</div>
		<footer>
        <center><p>Kelompok ACER (anak cerdas) &copy; 2015</p></center>
      </footer>
      <hr>
	</form>
	
	<?php
		}
		if(isset($_POST['submit'])){
			$queryupdate="DELETE FROM produk WHERE kode_brg='$kode_brg'";
			if (mysqli_query($koneksi, $queryupdate)){
				echo "data has been deleted successfully";
				header("Location: produk_list.php");
			}else{
				echo "error: " . $queryupdate . "<br>" . mysqli_error($koneksi);
			}
			
			mysqli_close($koneksi);
		}
	?>
</body>
</html>
