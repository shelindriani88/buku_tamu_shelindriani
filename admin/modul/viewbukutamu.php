<?php
	$dbname = "coba_db";
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "coba_Db");
	$hasil = mysqli_query( $conn , "select * from buku_tamu");
	$jumlah = mysqli_num_rows($hasil);
	echo "<center>DAFTAR PRNGUNJUNG</center>";
	echo "JUMLAH PENGUNJUNG : $jumlah";
	$a=1;
	while ($baris = mysqli_fetch_array($hasil)) {
		echo "<br>";
		echo $a;
		echo "<br>";
		echo "Status : ";
		echo $baris[0];
		echo "<br>";
		echo "Nama Lengkap : ";
		echo $baris[1];
		echo "<br>";
		echo "Email : ";
		echo $baris[2];
		echo "Alamat : ";
		echo $baris[3];
		echo "<br>";
		echo "Tanggal : ";
		echo $baris[4];
		echo "<br>";
		echo "Komentar : ";
		echo $baris[5];
		echo "<br>";
		$a++;
	}
?>