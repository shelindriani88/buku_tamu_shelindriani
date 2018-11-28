<?php
include "../include/koneksi.php";
include "../include/konversi_tgl.php";
//bagian home admin
if ($_GET['module']=='home') {
	echo "<h2>Halaman Utama</h2>
	<hr>
	<p class=welcome >Selamat Datang <b>$_SESSION[namauser]</b>,
		Silakan klik menu pilihan disebelah kiri untuk mengelola konten
		website<br> Terima Kasih</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p class=jam align=right>Login Hari ini: ";
			echo tgl_indo(date("Ymd"));
			echo " | ";
			echo date("H:i:s");
			echo "</p>";
		}
//bagian user
		elseif ($_GET['module']=='user') {
			include "modul/user.php";
		}
//bagian galeri
		elseif ($_GET['module']=='galeri') {
			include "modul/galeri.php";
		}

//bagian buku tamu
		elseif ($_GET['module']=='bukutamu') {
			include "modul/bukutamu.php";
		}
// Apabila modul tidak ditemukan
		else{
			echo "<p><b>MODUL BELUM ADA</b></p>";
		}
		?>