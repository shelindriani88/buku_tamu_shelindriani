<?php
session_start();
//error_reporting(0);

//pabiila user yang mengakses tidak sah
if (empty ($_SESSION['namauser']) and empty ($_SESSION['passuser'])) {
	echo "<center>Untuk megakses halaman ini, anda harus login terlebih dahulu <br>";
	echo "<a href=index.php><b>LOGIN</b></a></center";
}

//apabila user yang mengakses sah
else {
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>.:: Halaman Utama Administrator ::.</title>
		<link href="../include/style_admin.css" rel="stylesheet" type="text/css">
		<style>
td.relative {
    position: relative;
    left: 750px;
</style>
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="2" align="left" valign="top" background="../images/header_xxx.gif">

					<table width="40%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="57%"></td>
							<td width="43%" valign="bottom">
					
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
				
										<td class="relative" align="rigth" class="judul">
										<a href="server.php?module=home">Beranda</a> | <a href="server.php?module=gantipwd&id=<? echo "$_SESSION[namauser]>Ganti Password</a> | <a href="logout.php">Logout</a>
										</td>
						
									</tr>
								</table>
							</td>
						</tr>	
					</table>
				</td>
			</tr>
			<tr>

				<td width="200" valign="top" bgcolor="#white" id="menu">
				 <?php include "menu.php"; ?>
				</td>
				<td align="left" valign="top" bgcolor="#white" class="text"
				id="content">
				<?php include "konten.php"; ?></td>
			</tr>
			<tr>
				<td height="40" colspan="2" align="center" valign="middle" background="../images/background_1.jpg"><span class="kecil">Copyright <b>Polindra</b> &copy; 2001. All Right Reserved<br>
					<span class="style_text">Design By <a href="http://www.polindra.ac.id" target="_blank">Training Center TI Polindra</a></span></span></td>
			</tr>
			
		</table>
	
	</body>
	</html>
	<?php
}
?>