<?php
session_start();
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
  <body onload="startTime()">
		<section class="hero is-fullheight is-light is-bold">
      <div class="hero-body">
        <div class="container" style="max-width:920px">
			    <center>
			      <h1 class="title">Halaman transaksi barang</h1>
			      <h2 class="subtitle">Dengan petugas <b><?php echo $_SESSION['petugas'];?></b></h2>
						<div class="field is-grouped is-grouped-centered">
              <p class="control">
								<a class="button is-danger is-rounded" href="../logout.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
              </p>
              <p class="control">
								<a href="../index.php" class="button is-warning is-rounded"><i class="fas fa-arrow-left"></i>&nbspKembali</a>
              </p>
							<p class="control">
								<a href="transaksi.php" class="button is-info is-rounded"><i class="fas fa-exchange-alt"></i>&nbspLihat Daftar Transaksi</a>
              </p>
            </div>
						<br>
					</center>
					<div class="tile ">
						<form action="proses.php?action=simpan" method="post">
							<div class="field">
							  <label class="label">Pilih Barang :</label>
								<div class="control has-icons-left">
									<div class="select">
										<select name="id_barang" required>
											<?php
											include ('../../../config/connection.php');
											$resultcode = mysqli_query($conn, "SELECT * FROM `barang`");
											$listBarang = array();
											echo "<option disabled selected required>Silahkan Pilih Barang</option>";
											while ($row = mysqli_fetch_assoc($resultcode)){
												$listBarang[] = $row;
												echo "<option value='". $row['id_barang'] ."'>".$row['nama_barang']." (stok: ".$row['jumlah_barang']." | harga: ".$row['harga_barang'].")"."</option>";
											}
											?>
										</select>
									</div>
									<div class="icon is-small is-left">
										<i class="fas fa-globe"></i>
									</div>
								</div>
							</div>

							<div class="field">
							  <label class="label">Jumlah Beli :</label>
								<p class="control has-icons-left">
									<input class="input" name="jumlah" type="number" placeholder="Masukkan jumlah beli" required>
									<input type="hidden" name="trx" value="<?php echo date("d")."/AD/".$_SESSION['petugas']."/".date("y") ?>">
									<span class="icon is-small is-left">
										<i class="fas fa-cube"></i>
									</span>
								</p>
							</div>
							<button type="submit" class="button is-info is-rounded is-right"><i class="fas fa-plus"></i>&nbspTambah</button>
						</form>
					</div>
					<br>
					<h2 class="subtitle"><b><center>Tabel Transaksi Barang</center></b></h2>
					<table class="table is-hoverable is-fullwidth" style="margin-top: 20px; border-radius: 10px">
						<thead>
							<tr>
								<th>No.</th>
								<th>ID barang</th>
								<th>Nama barang</th>
								<th>Jumlah beli</th>
								<th>Harga barang</th>
								<th>Harga akumulasi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$trx=date("d")."/AD/".$_SESSION['petugas']."/".date("y");
								$data=mysqli_query($conn, "select barang.nama_barang, barang.harga_barang,tempo.id_subtransaksi,tempo.id_barang,tempo.jumlah_beli,tempo.total_harga from tempo inner join barang on barang.id_barang=tempo.id_barang where trx='$trx'");
								$getsum=mysqli_query($conn, "select sum(total_harga) as grand_total from tempo where trx='$trx'");
								$getsum1=mysqli_fetch_assoc($getsum);
								$no=1;
								while ($f=mysqli_fetch_assoc($data)) {
							?>
							<tr>
								<td>
									<span><?= $no++ ?></span>
								</td>
								<td><?= $f['id_barang'] ?></td>
								<td><?= $f['nama_barang'] ?></td>
								<td><?= $f['jumlah_beli'] ?></td>
								<td><?= $f['harga_barang'] ?></td>
								<td>Rp. <?= number_format($f['total_harga']) ?></td>
								<td>
									<a href="proses.php?action=hapus_tempo&id_tempo=<?= $f['id_subtransaksi'] ?>&id_barang=<?= $f['id_barang'] ?>&jumbel=<?= $f['jumlah_beli'] ?>"><span class="icon has-text-danger"><i class="fas fa-times"></i></span></a>
								</td>
							</tr>
							<?php
								}
							?>
							<tr>
								<?php if ($getsum1['grand_total']>0) { ?>
								<td colspan="4">Jam: <span id="waktu"></span>, Tanggal: <?=date('d-m-Y');?></td>
								<td colspan="3">Total bayar: <b>Rp. <?= number_format($getsum1['grand_total']) ?></b></td>
								<?php }else{ ?>
								<td colspan="7" class="has-text-centered">Data masih kosong</td>
								<?php } ?>
							</tr>
						</tbody>
					</table>
					<div class="tile">
						<form action="proses.php?action=transaksi" method="post">
							<div class="field">
								<label class="label">Nama Pembeli :</label>
								<p class="control has-icons-left">
									<input class="input" name="nama_pembeli" type="text" placeholder="Masukkan nama pembeli" required>
									<input type="hidden" name="total_bayar" value="<?= $getsum1['grand_total'] ?>">
									<span class="icon is-small is-left">
										<i class="fas fa-user"></i>
									</span>
								</p>
							</div>
							<button type="submit" class="button is-success is-rounded is-right"><i class="fas fa-shopping-cart"></i>&nbspProses Transaksi</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		<script>
			function startTime() {
			    var today = new Date();
			    var h = today.getHours();
			    var m = today.getMinutes();
			    var s = today.getSeconds();
			    m = checkTime(m);
			    s = checkTime(s);
			    document.getElementById('waktu').innerHTML =
			    h + ":" + m + ":" + s;
			    var t = setTimeout(startTime, 500);
			}
			function checkTime(i) {
			    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			    return i;
			}
		</script>
  </body>
</html>
