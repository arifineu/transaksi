<?php
	include '../../config/connection.php';

	$id	= $_POST['id_user'];
	$nama	= $_POST['nama_user'];
	$pass = $_POST['password'];
	$jenis = $_POST['jenis_user'];

	$cek_user=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE nama_user='$_POST[nama_user]'"));
	if ($cek_user > 0) {
	  echo '<script language="javascript">
	        alert ("Nama user telah digunakan");
	        window.location="edit.php?id_user='.$id	= $_POST['id_user'].'";
	        </script>';
	}else{
		$update = mysqli_query($conn, "UPDATE user SET nama_user='$nama', password='$pass', jenis_user='$jenis' WHERE id_user='$id'");
		if($update){
			echo '<script language="javascript">
		        alert ("Sukses update data");
		        window.location="index.php";
		        </script>';
		}else{
			echo '<script language="javascript">
		        alert ("Gagal mengedit data");
		        window.location="edit.php?id_user='.$id	= $_POST['id_user'].'";
		        </script>';
		}
	}
?>
