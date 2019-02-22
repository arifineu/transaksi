<?php
include '../../config/connection.php';

$nama	= $_POST['nama_user'];
$pass = $_POST['password'];
$jenis = $_POST['jenis_user'];

$cek_user=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE nama_user='$_POST[nama_user]'"));
if ($cek_user > 0) {
  echo '<script language="javascript">
        alert ("Nama user telah digunakan");
        window.location="tambah.php";
        </script>';
}else{
	$tambah = mysqli_query($conn, "INSERT INTO user (nama_user, password, jenis_user) VALUES ('$nama', '$pass', '$jenis')");
	if($tambah){
	echo '<script language="javascript">
					alert("Data petugas berhasil di tambah");
					document.location="index.php";
				</script>';
	}else{
	echo '<script language="javascript">
      		alert("Gagal menambah data");
      	  document.location="tambah.php";
      	</script>';
  }
}
?>
