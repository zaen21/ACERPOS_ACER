<?php
include("koneksi.php");
$id_suplier=$_GET['id_suplier'];
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
		$queryselects= "SELECT * FROM suplier WHERE id_suplier='$id_suplier'";
		$results= mysqli_query($koneksi, $queryselects);
		$row = mysqli_fetch_array($results, MYSQLI_ASSOC);

		if (mysqli_num_rows($results)==0){
			echo '<center><h2><font color="red">data tidak ditemukan.</center></h2></font>';
		}else{
	?>
	<hr>
	<div class="container">
	<div class="hero-unit">
	<center><h4>apakah anda yakin akan menghapus data ini?</h4>
		<table>
		<tr>
				<td>ID SUPLIER</td>
				<td> : </td>
				<td><input type="text" name="nama_suplier" disabled value="<?php echo $row['id_suplier']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>NAMA SUPLIER</td>
				<td> : </td>
				<td><input type="text" name="nama_suplier" disabled value="<?php echo $row['nama_suplier']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td colspan=3 align="center">
					<input type="submit" name="submit"/>
					<input type="button" value="cancel" onclick="window.location='suplier_list.php'">
				</td>
			</tr>
		</table>
		</center>
		</div>
		</div>
		<hr>
	</form>
	
	<?php
		}
		if(isset($_POST['submit'])){
			$queryupdates="DELETE FROM suplier WHERE id_suplier='$id_suplier'";
			if (mysqli_query($koneksi, $queryupdates)){
				echo "data has been deleted successfully";
				header("Location: suplier_list.php");
			}else{
				echo "error: " . $queryupdates . "<br>" . mysqli_error($koneksi);
			}
			
			mysqli_close($koneksi);
		}
	?>
</body>
</html>
