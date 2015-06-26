<?php
include("koneksi.php");
$id_user=$_GET['id_user'];
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
<hr>
      <footer>
        <center><p>Kelompok ACER (anak cerdas) &copy; 2015</p></center>
      </footer>
<div class="hero-unit">

	<form method="post">
	<?php
		$queryselect= "SELECT * FROM user WHERE id_user='$id_user'";
		$result= mysqli_query($koneksi, $queryselect);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if (mysqli_num_rows($result)==0){
			echo '<center><h2><font color="red">data tidak ditemukan.</center></h2></font>';
		}else{
	?>
	
	<center><h4>apakah anda yakin akan menghapus data ini?</h4>
		<table>
			<tr>
				<td>NAMA ANGGOTA</td>
				<td> : </td>
				<td><input type="text" name="nama" disabled value="<?php echo $row['nama']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>LEVEL ANGGOTA</td>
				<td> : </td>
				<td><input type="text" name="level" disabled value="<?php echo $row['level']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td colspan=3 align="center">
					<input type="submit" name="submit"/>
					<input type="button" value="cancel" onclick="window.location='data_anggota_acer.php'">

				</td>
			</tr>
		</table>
	</form>
	</center>
	<?php
		}
		if(isset($_POST['submit'])){
			$queryupdate="DELETE FROM user WHERE id_user='$id_user'";
			if (mysqli_query($koneksi, $queryupdate)){
				echo "data has been deleted successfully";
				header("Location: data_anggota_acer.php");
			}else{
				echo "error: " . $queryupdate . "<br>" . mysqli_error($koneksi);
			}
			
			mysqli_close($koneksi);
		}
	?>

	</div>
      <footer>
        <center><p>Kelompok ACER (anak cerdas) &copy; 2015</p></center>
      </footer>
      <hr>
</body>
</html>
