<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['admin'])){
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
			      <h1 class="title">Halaman Admin</h1>
			      <h2 class="subtitle">Selamat datang <b><?php echo $_SESSION['admin'];?></b></h2>
						<div class="field is-grouped is-grouped-centered">
              <p class="control">
								<a class="button is-danger is-rounded" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
              </p>
              <p class="control">
								<a class="button is-primary is-rounded" href="tambah.php"><i class="fas fa-user-plus"></i>&nbspTambah daftar petugas</a>
              </p>
            </div>
						<br>
			      <table class="table is-hoverable" style="border-radius: 10px">
			        <thead>
			          <tr>
			            <th>No.</th>
			            <th>Id User</th>
			            <th>Username</th>
			            <th>Jenis User</th>
			            <th>Opsi Data</th>
			          </tr>
			        </thead>
			          <?php
			            include ("../../config/connection.php");
			            $no = 1;
			            $hasil = mysqli_query($conn, "SELECT * FROM user WHERE jenis_user='petugas'");
			            if (!$hasil) {
			              printf("Error: %s\n", mysqli_error($conn));
			              exit();
			            }else{
			              while ($result = mysqli_fetch_array($hasil)){
			          ?>
			            <tbody>
			                <tr>
			                  <td><?=$no;?></td>
			                  <td><?=$result['id_user'];?></td>
			                  <td><?=$result['nama_user'];?></td>
			                  <td><?=$result['jenis_user'];?></td>
			                  <td>
			                    <p>
			                      <?php
			                        echo '<a class="button is-info is-rounded" href="edit.php?id_user='.$result['id_user'].'"><i class="fas fa-pencil-alt"></i></a>';
			                      ?>
			                      <?php
			                        echo '<a class="button is-danger is-rounded" href="delete.php?id_user='.$result['id_user'].'"><i class="fas fa-trash-alt"></i></a>';
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
