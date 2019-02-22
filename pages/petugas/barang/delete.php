<?php
	include '../../../config/connection.php';
	$id=$_GET['id_barang'];
	$sql = mysqli_query($conn, "DELETE FROM `barang` WHERE `id_barang`='$id'");
	if($sql){
?>

<script language="javascript">
	alert('Berhasil menghapus');
	document.location="../index.php";
</script>

<?php
	}else{
?>

<script language="javascript">
	alert('Gagal menghapus');
  document.location="../index.php";
</script>
<?php
	}
?>
