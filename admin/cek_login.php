<?php
	include "../include/koneksi.php";
	$login=mysqli_query($koneksi,"select * from admin where
	id_user='$_POST[id_user]' and password='$_POST[password]'");

	$dapat=mysqli_num_rows($login);
	$r=mysqli_fetch_array($login);
	//apabila username dan password ditemukan
	if($dapat > 0)
	{
		 session_start(); //awal session
		
		//isi dari variabel session
		 $_SESSION['namauser']=$r['id_user'];
		 $_SESSION['passuser']=$r['password'];
		//buka halaman utama administrator
		 header('location:server.php?module=home');
	} 
else
{
	 print "<script>
	 alert(\"Periksa Pengisian Form\");
	 location.href = \"index.php\";
	 </script>";
}
?>