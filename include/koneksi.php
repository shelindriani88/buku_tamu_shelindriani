<?php
		$server = "localhost";
		$username = "root";
		$password = "";
		$database = "coba_db";

		//koneksi dan pilih database di server
		$koneksi = mysqli_connect($server,$username,$password) or die (mysqli_error());
		
		$database = mysqli_select_db($koneksi, $database) or die ("database tidak
		ditemukan");
?>
