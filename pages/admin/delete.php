<?php
	include '../../config/connection.php';
	$id=$_GET['id_user'];
	$sql = mysqli_query($conn, "DELETE FROM `user` WHERE `id_user`='$id'");
	if($sql){
?>

<script language="javascript">
	alert('Berhasil menghapus');
	document.location="index.php";
</script>

<?php
	}else{
?>

<script language="javascript">
	alert('Gagal menghapus');
</script>
<?php
	}
?>
