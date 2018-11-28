<?php
include "../include/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];

	//delete data dalam database
if ($module=='user' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from admin where id_user='$_GET[id]'");
	header('location:server.php?module=user');
}
	//bagian user
	//input user
elseif ($module=='user' AND $act=='input'){
	$id_login=$_POST['id_user'];
	$id=mysqli_query($koneksi, "select * from admin where id_user='$id_login'
		");
	$r=mysqli_fetch_array($id);
	$cek=$r[id_user];
	if($id_login = $cek) {
		print "<script>alert(\"user dengan nama $id_login sudah
		terdaftar, Silahkan Cek Kembali!!!\");
		location.href = \"server.php?module=user&act=tambahuser\";
	</script>";
}
elseif(empty($_POST['id_user'])){
	print "<script>alert(\"username tidak boleh kosong!!!\");
	location.href = \"javascript:history.go(-1)\";</script>";
}
elseif(empty($_POST['password'])){
	print "<script>alert(\"password tidak boleh kosong!!!\");
	location.href = \"javascript:history.go(-1)\";</script>";
}
else{
	$pass=$_POST['password'];
	mysqli_query($koneksi, "insert into
		admin(id_user,password)values('$_POST[id_user]','$pass')");
	header('location:server.php?module='.$module);
}
}
	//update user
elseif ($module=='user' and $act=='update') {
	if(empty($_POST['id_user'])){
		print "<script>alert(\"username tidak boleh kosong!!!\");
		location.href = \"javascript:history.go(-1)\";</script>";
	}
	else{
	//apabila password tidak dirubah
		if (empty($_POST[password])) {
			mysqli_query($koneksi, "update admin set id_user='$_POST[id_user]'
				where id_user='$_POST[id]'");
		}
	//apabila password dirubah
		else{
			$pass=$_POST[password];
			mysqli_query($koneksi, "update admin set id_user='$_POST[id_user]',
				password='$pass' where id_user='$_POST[id]'");
		}
		header('location:server.php?module=user');
	}
}elseif($module=='bukutamu' and $act=='inputtamu'){
	mysqli_query($koneksi, "insert into buku_tamu(id_bktamu, status_bktamu, nm_bktamu, email_bktamu, alamat_bktamu, tgl_bktamu, komentar) values ('$_POST[id_bktamu]', '$_POST[status_bktamu]', '$_POST[nama_bktamu]', '$_POST[email_bktamu]', '$_POST[alamat_bktamu]', '$_POST[tgl_bktamu]', '$_POST[komentar]') ");
	header('location:server.php?module=bukutamu');

}

elseif($module=='bukutamu' and $act=='inputtamu'){
	mysqli_query($koneksi, "insert into buku_tamu(id_bktamu, status_bktamu, nm_bktamu, email_bktamu, alamat_bktamu, tgl_bktamu, komentar) values ('$_POST[id_bktamu]', '$_POST[status_bktamu]', '$_POST[nama_bktamu]', '$_POST[email_bktamu]', '$_POST[alamat_bktamu]', '$_POST[tgl_bktamu]', '$_POST[komentar]') ");
	header('location:server.php?module=bukutamu');

}
//Script tambahan di ketik di paling bawah
//BAGIAN GALERI
//upload photo
elseif ($module=='galeri' and $act=='input')
{
	$set = true;
	$msg = "";
//tentukan variabel file yg diupload dan tipe file
	$tipe_file = $_FILES['gam']['type'];
	$lokasi_file = $_FILES['gam']['tmp_name'];
	$nama_file = $_FILES['gam']['name'];
	$save_file =move_uploaded_file($lokasi_file,"galeri/$nama_file");
	if(empty($lokasi_file))
	{
		$set=false;
		$msg= $msg. 'Upload gagal, Anda Lupa Mengambil Gambar..';
	}
	else
	{
 //tentukan tipe file harus image
		if ($tipe_file != "image/gif" and
			$tipe_file != "image/jpeg" and
			$tipe_file != "image/jpg" and
			$tipe_file != "image/pjpeg" and
			$tipe_file != "image/png")
		{
			$set=false;
			$msg= $msg. 'Upload gagal, tipe file harus image..';
		}
		else
		{
			isset($save_file);
		}
//replace di server
		if($save_file)
		{
			chmod("galeri/$nama_file", 0777);
		}
		else
		{
			$msg = $msg.'Upload Image gagal..';
			$set = false;
		}
	}
	if($set)
	{
		$nm_galeri=$_POST['nm_gal'];
		$ket=$_POST['ket'];
		$tgl=date('d n Y');
		$sql=mysqli_query($koneksi,"insert into
			galeri(nm_galeri,ket,tgl_galeri,gambar)values('$nm_galeri','$ket'
			,'$tgl','$nama_file')");
		$msg= $msg.'Upload Galeri Sukses..';
		print "<meta http-equiv=\"refresh\"
		content=\"1;URL=server.php?module=galeri&act=view\">";
	}
	echo "$msg";
}
//Update galeri
elseif ($module=='galeri' and $act=='update')
{
	$set = true;
	$msg = "";
//tentukan variabel file yg diupload dan tipe file
	$tipe_file = $_FILES['gam_baru']['type'];
	$lokasi_file = $_FILES['gam_baru']['tmp_name'];
	$nama_file = $_FILES['gam_baru']['name'];
	$save_file =move_uploaded_file($lokasi_file,"galeri/$nama_file");
	if(empty($lokasi_file))
	{
		isset($set);
	}
	else
	{
//tentukan tipe file harus image
		if ($tipe_file != "image/gif" and
			$tipe_file != "image/jpeg" and
			$tipe_file != "image/jpg" and
			$tipe_file != "image/pjpeg" and
			$tipe_file != "image/png")
		{
			$set=false;
			$msg= $msg. 'Upload gagal, tipe file harus image..';
		}
		else
		{
			$unlink=mysqli_query($koneksi,"select * from galeri where
				id_galeri='$_POST[id]'");
			$CekLink=mysqli_fetch_array($unlink);
			if(!empty($CekLink[gambar]))
			{
				unlink("galeri/$CekLink[gambar]");
			}
			isset($save_file);
		}
//replace di server
		if($save_file)
		{
			chmod("galeri/$nama_file", 0777);
		}
		else{
			$msg = $msg.'Upload Image gagal..';
			$set = false;
		}
	}
	if($set)
	{
		$id=$_POST[id];
		$nm_galeri=$_POST[nm_gal];
		$ket=$_POST[ket];
		if(empty($lokasi_file))
		{
			mysqli_query($koneksi,"update galeri set nm_galeri='$nm_galeri',
				ket='$ket'
				where id_galeri='$id'");
		}else{
			mysqli_query($koneksi,"update galeri set nm_galeri='$nm_galeri',
				ket='$ket',
				gambar='$nama_file'
				where id_galeri='$id'");
		}
		$msg= $msg.'Update Galeri Sukses..';
		print "<meta http-equiv=\"refresh\"
		content=\"1;URL=server.php?module=galeri&act=view\">";
	}
	echo "$msg";
}
//hapus record Galeri
elseif ($module=='galeri' and $act=='hapus')
{
	$unlink=mysqli_query($koneksi,"select * from galeri where
		id_galeri='$_GET[id]'");
	$CekLink=mysqli_fetch_array($unlink);
	if(!empty($CekLink[gambar]))
	{
		unlink("galeri/$CekLink[gambar]");
	}
	mysqli_query($koneksi,"delete from galeri where id_galeri='$_GET[id]'");
	header('location:server.php?module=galeri&act=view'.$module);
}
?>