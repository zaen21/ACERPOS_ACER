<?php
		$servername = "localhost";
		$username ="root";
		$password = "";
		$databasename = "acerpoint";
		
		$koneksi = mysqli_connect($servername, $username, $password, $databasename);

	if (mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>
