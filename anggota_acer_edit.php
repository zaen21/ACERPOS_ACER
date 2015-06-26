<?php
include("koneksi.php");
$id_user=$_GET['id_user'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<form method="post">
	<?php
		$queryselect= "SELECT * FROM user WHERE id_user='$id_user'";
		$result= mysqli_query($koneksi, $queryselect);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if (mysqli_num_rows($result)==0){
			echo '<center><h2><font color="red">data tidak ditemukan.</center></h2></font>';
		}else{
	?>
	<h3>FORM EDIT DATA PELANGGAN</h3>
		<table>
			<tr>
				<td>No.ID</td>
				<td>:</td>
				<td><input type="number" name="id_user" value="<?php echo $row['id_user']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td colspan=3 align="center"><input type="submit" name="submit"/></td>
			</tr>
		</table>	
	</form>
	<?php
		}
		if(isset($_POST['submit'])){
			$id_user = $_POST['id_user'];



			$queryupdate = "UPDATE user SET id_user='$id_user'";
			
			if (mysqli_query($koneksi, $queryupdate)){
				echo "data has been updated succesfully";
				header("Location: data_anggota_acer.php");
			}else{
				echo "error: ". $queryupdate . "<br/>". mysqli_error($koneksi);
			}
			
			mysqli_close($koneksi);
		}
?>
</body>
</html>
