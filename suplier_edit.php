<?php
include("koneksi.php");
$id_suplier=$_GET['id_suplier'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<form method="post">
	<?php
		$queryselect= "SELECT * FROM suplier WHERE id_suplier='$id_suplier'";
		$result= mysqli_query($koneksi, $queryselect);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if (mysqli_num_rows($result)==0){
			echo '<center><h2><font color="red">data tidak ditemukan.</center></h2></font>';
		}else{
	?>
	<center><h3>FORM EDIT SUPLIER</h3>
		<table>
			<tr>
				<td>ID SUPLIER</td>
				<td>:</td>
				<td><input type="number" name="id_suplier" disabled value="<?php echo $row['id_suplier']; ?>" size="50"/></td>
			</tr>
			<tr>
			<tr>
				<td>NAMA Suplier</td>
				<td> : </td>
				<td><input type="text" name="nama" value="<?php echo $row['nama_suplier']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td> : </td>
				<td><input type="text" name="level" value="<?php echo $row['alamat']; ?>" size="50"/></td>
			</tr>
			<tr>
			<tr>
				<td>No.Hp</td>
				<td> : </td>
				<td><input type="text" name="level" value="<?php echo $row['no_hp']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td colspan=3 align="center"><input type="submit" name="submit"/>
				<input type="button" value="cancel" onclick="window.location='suplier_list.php'"></td>
				</tr>
		</tr>
		</table>
		</center>	
	</form>
	<?php
		}
		if(isset($_POST['submit'])){
			$id_suplier = $_POST['id_suplier'];

			$queryupdate = "UPDATE suplier SET id_suplier='$id_suplier'";
			
			if (mysqli_query($koneksi, $queryupdate)){
				echo "data has been updated succesfully";
				header("Location: suplier_list.php");
			}else{
				echo "error: ". $queryupdate . "<br/>". mysqli_error($koneksi);
			}
			
			mysqli_close($koneksi);
		}
?>
</body>
</html>
