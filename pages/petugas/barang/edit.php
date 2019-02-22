<?php
  include ("../../../config/connection.php");
  $result=$_GET['id_barang'];
  $show=mysqli_query($conn, "SELECT * FROM `barang` WHERE `id_barang`='$result'");
  $hasil_data = mysqli_fetch_array($show);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Data Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../css/bulma.css">
    <link rel="stylesheet" href="../../../css/fontawesome/css/all.min.css">
  </head>
  <body>
    <section class="hero is-fullheight is-light is-bold">
      <div class="hero-body">
        <div class="container" style="max-width:820px">
			    <center>
            <h1 class="title">Edit data barang</h1>
            <form action="edit-proses.php" method="post">
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">ID Barang</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="id_barang" value="<?=$hasil_data['id_barang'];?>" readonly>
                      <span class="icon is-small is-left">
                        <i class="fas fa-info"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Nama Barang</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="nama_barang" value="<?=$hasil_data['nama_barang'];?>">
                      <span class="icon is-small is-left">
                        <i class="fas fa-tag"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Jumlah Barang</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="jumlah_barang" value="<?=$hasil_data['jumlah_barang'];?>">
                      <span class="icon is-small is-left">
                        <i class="fas fa-cube"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Harga Barang</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="harga_barang" value="<?=$hasil_data['harga_barang'];?>">
                      <span class="icon is-small is-left">
                        <i class="fas fa-dollar-sign"></i>
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
                  <a href="../index.php" class="button is-danger is-rounded"><i class="fas fa-arrow-left"></i>&nbspKembali</a>
                </p>
              </div>
            </form>
          </center>
        </div>
      </div>
    </section>
  </body>
</html>
