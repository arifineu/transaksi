<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tambah Barang</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../css/bulma.css">
    <link rel="stylesheet" href="../../../css/fontawesome/css/all.min.css">
  </head>
  <body>
    <section class="hero is-fullheight is-light is-bold">
      <div class="hero-body">
        <div class="container" style="max-width:820px">
			    <center>
            <h1 class="title">Tambah daftar barang</h1>
            <form action="tambah-proses.php" method="post">
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Nama barang</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="nama_barang" placeholder="nama barang" required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-tag"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Jumlah barang</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left">
                      <input class="input" type="number" name="jumlah_barang" placeholder="jumlah barang" required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-cube"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Harga barang</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="number" name="harga_barang" placeholder="harga barang" required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-dollar-sign"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-grouped is-grouped-centered">
                <p class="control">
                  <button class="button is-success is-rounded" type="submit"><i class="fas fa-cube"></i>&nbspTambah</button>
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
