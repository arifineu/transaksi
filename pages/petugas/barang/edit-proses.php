<?php
	include '../../../config/connection.php';

	$id	= $_POST['id_barang'];
  $nama	= $_POST['nama_barang'];
  $jumlah = $_POST['jumlah_barang'];
  $harga = $_POST['harga_barang'];

	$update = mysqli_query($conn, "UPDATE barang SET nama_barang='$nama', jumlah_barang='$jumlah', harga_barang='$harga' WHERE id_barang='$id'");
	if($update){
?>
<script language="javascript">
	alert('Data behasil diedit');
	document.location="../index.php";
</script>

<?php
	}else{
?>

<script language="javascript">
	alert('Gagal mengedit');
  document.location="../index.php";
</script>
<?php
	}
?>
