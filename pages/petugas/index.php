<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['petugas'])){
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="../../index.php";</script>';
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Halaman Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/bulma.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
  </head>
  <body>
		<section class="hero is-fullheight is-light is-bold">
      <div class="hero-body">
        <div class="container" style="max-width:920px">
			    <center>
						<h1 class="title">Halaman Petugas</h1>
			      <h2 class="subtitle">Selamat datang <b><?php echo $_SESSION['petugas'];?></b></h2>
						<div class="field is-grouped is-grouped-centered">
              <p class="control">
								<a class="button is-danger is-rounded" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
              </p>
              <p class="control">
								<a class="button is-primary is-rounded" href="barang/tambah.php"><i class="fas fa-cube"></i>&nbspTambah daftar barang</a>
              </p>
							<p class="control">
								<a class="button is-info is-rounded" href="transaksi/"><i class="fas fa-exchange-alt"></i>&nbsptransaksi barang</a>
              </p>
            </div>
						<br>
			      <table class="table is-hoverable" style="border-radius: 10px">
			        <thead>
			          <tr>
			            <th>No.</th>
			            <th>Id Barang</th>
			            <th>Nama Barang</th>
			            <th>Jumlah Barang</th>
			            <th>Harga Barang</th>
			            <th>Opsi Data</th>
			          </tr>
			        </thead>
			          <?php
			            include ("../../config/connection.php");
			            $no = 1;
			            $hasil = mysqli_query($conn, "SELECT * FROM barang");
			            if (!$hasil) {
			              printf("Error: %s\n", mysqli_error($conn));
			              exit();
			            }else{
			              while ($result = mysqli_fetch_array($hasil)){
			          ?>
			            <tbody>
			                <tr>
			                  <td><?=$no;?></td>
			                  <td><?=$result['id_barang'];?></td>
			                  <td><?=$result['nama_barang'];?></td>
			                  <td><?=$result['jumlah_barang'];?></td>
			                  <td><?=$result['harga_barang'];?></td>
			                  <td>
			                    <p>
			                      <?php
			                        echo '<a class="button is-info is-rounded" href="barang/edit.php?id_barang='.$result['id_barang'].'"><i class="fas fa-pencil-alt"></i></a>';
			                      ?>
			                      <?php
			                        echo '<a class="button is-danger is-rounded" href="barang/delete.php?id_barang='.$result['id_barang'].'"><i class="fas fa-trash-alt"></i></a>';
			                      ?>
			                    </p>
			                  </td>
			                </tr>
			              <?php
			                $no++;
			              ?>
			            </tbody>
			          <?php
			              }
			            }
			          ?>
			      </table>
			    </center>
				</div>
			</div>
		</section>
  </body>
</html>
