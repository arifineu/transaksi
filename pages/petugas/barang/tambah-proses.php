<?php
include '../../../config/connection.php';

$nama	= $_POST['nama_barang'];
$jumlah = $_POST['jumlah_barang'];
$harga = $_POST['harga_barang'];

$tambah = mysqli_query($conn, "INSERT INTO barang (nama_barang, jumlah_barang, harga_barang) VALUES ('$nama', '$jumlah', '$harga')");
if($tambah){
?>
<script language="javascript">
	alert('Data barang berhasil di tambah');
	document.location="../index.php";
</script>

<?php
	}else{
?>

<script language="javascript">
	alert('Gagal menambah data');
  document.location="../index.php";
</script>
<?php
	}
?>
