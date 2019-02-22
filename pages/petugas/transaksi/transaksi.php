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
        <div class="container" style="max-width:920px">
			    <center>
			      <h1 class="title">Daftar Transaksi</h1>
			      <h2 class="subtitle">Dengan petugas <b><?php echo $_SESSION['petugas'];?></b></h2>
						<div class="field is-grouped is-grouped-centered">
              <p class="control">
								<a class="button is-danger is-rounded" href="../logout.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
              </p>
              <p class="control">
								<a href="index.php" class="button is-warning is-rounded"><i class="fas fa-arrow-left"></i>&nbspKembali</a>
              </p>
            </div>
						<br>
					</center>
					<h2 class="subtitle"><b><center>Daftar Transaksi Barang</center></b></h2>
          <?php
          $query=mysqli_query($conn, "select id_user from user where nama_user='$_SESSION[petugas]'");
          $query1 = mysqli_fetch_row($query);
          $id_user = $query1;
          $query2=mysqli_query($conn, "select * from transaksi where kode_kasir='$id_user'");
      		$jumlah=mysqli_num_rows($query2);
          ?>
          <span class="label">Jumlah Transaksi : <?= $jumlah ?></span>
					<table class="table is-hoverable is-fullwidth" style="margin-top: 20px; border-radius: 10px">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tgl. Transaksi</th>
								<th>Total Bayar</th>
								<th>Nama Pembeli</th>
								<th>No. Invoice</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php
                $no=1;
                $q=mysqli_query($conn, "select * from transaksi where kode_kasir='$id_user' order by id_transaksi desc");
        				if ($q->num_rows > 0) {
          				while ($f=mysqli_fetch_assoc($q)) {
              ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
								<td>Rp. <?= number_format($f['total_bayar']) ?></td>
								<td><?= $f['nama_pembeli'] ?></td>
								<td><?= $f['no_invoice'] ?></td>
								<td>
                  <div class="field is-grouped">
                    <p class="control">
                      <a href="detail_transaksi.php?id_transaksi=<?= $f['id_transaksi'] ?>" class="button is-info is-rounded"><i class="far fa-eye"></i>&nbspDetail</a>
                    </p>
                    <p class="control">
        							<a href="cetak_nota.php?oid=<?= base64_encode($f['id_transaksi']) ?>&id-uid=<?= base64_encode($f['nama_pembeli']) ?>&inf=<?= base64_encode($f['no_invoice']) ?>&tb=<?= base64_encode($f['total_bayar']) ?>&uuid=<?= base64_encode(date("d-m-Y",strtotime($f['tgl_transaksi']))) ?>" target="_blank" class="button is-link is-rounded"><i class="fas fa-print"></i>&nbspCetak</a>
                    </p>
                  </div>
								</td>
							</tr>
              <?php
                  }
                }
              ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
  </body>
</html>
