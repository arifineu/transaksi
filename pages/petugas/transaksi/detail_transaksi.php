<?php
require_once '../../../config/connection.php';
error_reporting(0);
if(!isset($_SESSION['petugas'])){
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="../../../index.php";</script>';
}
?>
<!DOCTYPE html>
<html>
  <head>
		<meta charset="utf-8">
    <title>Halaman Transaksi</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../css/bulma.css">
    <link rel="stylesheet" href="../../../css/fontawesome/css/all.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body>
		<section class="hero is-fullheight is-light is-bold">
      <div class="hero-body">
        <div class="container">
          <div class="box">
            <h4 class="title is-4">Detail Transaksi</h4>
            <?php
              $getqheader=mysqli_query($conn, "select * from transaksi where id_transaksi='$_GET[id_transaksi]'");
              $getqheader=mysqli_fetch_assoc($getqheader);
            ?>
            <table>
    					<tr>
    						<td><span class="subtitle is-5">Nama Pembeli</span></td>
                <td><span class="subtitle is-5">&nbsp:&nbsp</span></td>
    						<td><span class="subtitle is-5"><?= $getqheader['nama_pembeli'] ?></span></td>
    					</tr>
    					<tr>
    						<td><span class="subtitle is-5">Tanggal Transaksi</span></td>
                <td><span class="subtitle is-5">&nbsp:&nbsp</span></td>
    						<td><span class="subtitle is-5"><?= date("d-m-Y",strtotime($getqheader['tgl_transaksi'])) ?></span></td>
    					</tr>
    					<tr>
    						<td><span class="subtitle is-5">No Invoice</span></td>
                <td><span class="subtitle is-5">&nbsp:&nbsp</span></td>
    						<td><span class="subtitle is-5"><?= $getqheader['no_invoice'] ?></span></td>
    					</tr>
    				</table>
            <table class="table is-hoverable is-fullwidth" style="margin-top: 20px">
              <thead>
        				<tr>
        					<th>No.</th>
        					<th>Nama Barang</th>
        					<th>Jumlah Beli</th>
        					<th>Harga</th>
        					<th>Harga Akumulasi</th>
        				</tr>
        			</thead>
              <tbody>
                <?php
          				// $trx=date("d")."/AD/".$_SESSION['status']."/".date("y");
          				$data=mysqli_query($conn, "select barang.nama_barang, barang.harga_barang, sub_transaksi.jumlah_beli, sub_transaksi.total_harga from sub_transaksi inner join barang on barang.id_barang=sub_transaksi.id_barang where sub_transaksi.id_transaksi='$_GET[id_transaksi]'");
          				$getsum=mysqli_query($conn, "select sum(total_harga) as grand_total, sum(jumlah_beli) as jumlah_beli from sub_transaksi where id_transaksi='$_GET[id_transaksi]'");
          				$getsum1=mysqli_fetch_assoc($getsum);
          				$no=1;
          				while ($f=mysqli_fetch_assoc($data)) {
      					?>
                <tr>
                  <td><?= $no++ ?></td>
      						<td><?= $f['nama_barang'] ?></td>
      						<td><?= $f['jumlah_beli'] ?></td>
      						<td>Rp. <?= number_format($f['harga_barang']) ?></td>
      						<td>Rp. <?= number_format($f['total_harga']) ?></td>
                </tr>
                <?php
                  }
                ?>
                <tr>
                  <td colspan="3"></td>
                  <td><b>Total Harga : </b></td>
                  <td><b>Rp. <?= number_format($getsum1['grand_total']) ?></b></td>
                </tr>
              </tbody>
            </table>
            <a href="transaksi.php" class="button is-warning is-rounded"><i class="fas fa-arrow-left"></i>&nbspKembali</a>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
