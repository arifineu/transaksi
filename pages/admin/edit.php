<?php
  include ("../../config/connection.php");
  $result=$_GET['id_user'];
  $show=mysqli_query($conn, "SELECT * FROM `user` WHERE `id_user`='$result'");
  $hasil_data = mysqli_fetch_array($show);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit data petugas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/bulma.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
  </head>
  <body>
		<section class="hero is-fullheight is-light is-bold">
      <div class="hero-body">
        <div class="container" style="max-width:820px">
			    <center>
            <h1 class="title">Edit data petugas</h1>
            <form action="edit-proses.php" method="post">
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">ID User</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="id_user" value="<?=$hasil_data['id_user'];?>" readonly>
                      <span class="icon is-small is-left">
                        <i class="fas fa-id-badge"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Username</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="nama_user" value="<?=$hasil_data['nama_user'];?>" required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Password</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left">
                      <input class="input" type="text" name="password" value="<?=$hasil_data['password'];?>" required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Jenis User</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left">
                      <input class="input" type="text" name="jenis_user" value="<?=$hasil_data['jenis_user'];?>" readonly>
                      <span class="icon is-small is-left">
                        <i class="fas fa-user-friends"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-grouped is-grouped-centered">
                <p class="control">
                  <button class="button is-success is-rounded" type="submit"><i class="fas fa-save"></i>&nbspSimpan</button>
                </p>
                <p>
                  <a href="index.php" class="button is-danger is-rounded"><i class="fas fa-arrow-left"></i>&nbspKembali</a>
                </p>
              </div>
            </form>
			    </center>
				</div>
			</div>
		</section>
  </body>
</html>
