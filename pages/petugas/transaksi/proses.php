<?php
// error_reporting(0);
require_once '../../../config/connection.php';

if (isset($_GET['action'])) {
  $action=$_GET['action'];
  if ($action=='simpan') {
    $id_barang=$_POST['id_barang'];
    $jumlah=$_POST['jumlah'];
    $trx=$_POST['trx'];
    $q1=mysqli_query($conn, "select * from barang where id_barang='$id_barang'");
    $data=$q1->fetch_assoc();
    if ($data['jumlah_barang'] < $jumlah) {
      echo "<script>
      alert('Stock tidak mencukupi');
      window.location.href='index.php';
      </script>";
    }else{
      $q=mysqli_query($conn, "select * from tempo where id_barang='$id_barang'");
      if ($q->num_rows > 0) {
        $ubah=$q->fetch_assoc();
        $jumbel=$ubah['jumlah_beli']+$jumlah;
        $total_harga=$jumbel*$data['harga_barang'];
        $dbquery=mysqli_query($conn, "update tempo set jumlah_beli='$jumbel',total_harga='$total_harga' where id_barang='$id_barang'");
        if ($dbquery === TRUE) {
          mysqli_query($conn, "update barang set jumlah_barang=jumlah_barang-$jumlah where id_barang='$id_barang'");
          echo "<script>
          alert('Tersimpan');
          window.location.href='index.php';
          </script>";
        }
      }else{
        $total_harga=$jumlah*$data['harga_barang'];
        $query1=mysqli_query($conn, "insert into tempo set id_barang='$id_barang',jumlah_beli='$jumlah',total_harga='$total_harga',trx='$trx'");
        if ($query1 === TRUE) {
          mysqli_query($conn, "update barang set jumlah_barang=jumlah_barang-$jumlah where id_barang='$id_barang'");
          echo "<script>
          alert('Tersimpan');
          window.location.href='index.php';
          </script>";
        }
      }
    }
  }else if($action=='hapus_tempo'){
    $id_tempo=$_GET['id_tempo'];
    $id_barang=$_GET['id_barang'];
    $jumbel=$_GET['jumbel'];
    $query=mysqli_query($conn, "delete from tempo where id_subtransaksi='$id_tempo'");
    if ($query===TRUE) {
      $query2=mysqli_query($conn, "update barang set jumlah_barang=jumlah_barang+$jumbel where id_barang='$id_barang'");
      if ($query2===TRUE) {
        echo "<script>
        alert('Barang berhasil di cancel');
        window.location.href='index.php';
        </script>";
      }
    }
  }else{
  	$trx=date("d")."/AD/".$_SESSION['petugas']."/".date("y/h/i/s");
		$query=mysqli_query($conn, "insert into transaksi set kode_kasir='$_SESSION[id]',total_bayar='$_POST[total_bayar]',no_invoice='$trx',nama_pembeli='$_POST[nama_pembeli]'");
		$trx2=date("d")."/AD/".$_SESSION['petugas']."/".date("y");
		$get1=mysqli_query($conn, "select * from transaksi where no_invoice='$trx'");
		$datatrx=mysqli_fetch_assoc($get1);
		$id_transaksi2=$datatrx['id_transaksi'];
		$query2=mysqli_query($conn, "select * from tempo where trx='$trx2'");
		while ($f=mysqli_fetch_assoc($query2)) {
			mysqli_query($conn, "insert into sub_transaksi set id_barang='$f[id_barang]',id_transaksi='$id_transaksi2',jumlah_beli='$f[jumlah_beli]',total_harga='$f[total_harga]',no_invoice='$trx'");
		}
		mysqli_query($conn, "delete from tempo where trx='$trx2'");
    echo "<script>
    alert('Transaksi Berhasil');
    window.location.href='transaksi.php';
    </script>";
  }
}
?>
