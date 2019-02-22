<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tambah daftar petugas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/bulma.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
  </head>
  <body>
		<section class="hero is-fullheight is-light is-bold">
      <div class="hero-body">
        <div class="container" style="max-width:820px">
			    <center>
            <h1 class="title">Tambah daftar petugas</h1>
            <form action="tambah-proses.php" method="post">
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Username</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="nama_user" placeholder="nama user" required>
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
                      <input class="input" type="password" name="password" placeholder="password" required>
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
                    <div class="control has-icons-left has-icons-right">
                      <input class="input" type="text" name="jenis_user" value="petugas" readonly>
                      <span class="icon is-small is-left">
                        <i class="fas fa-user-friends"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-grouped is-grouped-centered">
                <p class="control">
                  <button class="button is-success is-rounded" type="submit"><i class="fas fa-user-plus"></i>&nbspTambah</button>
                </p>
                <p>
                  <a href="index.php" class="button is-dark is-rounded"><i class="fas fa-backspace"></i>&nbspKembali</a>
                </p>
              </div>
            </form>
			    </center>
				</div>
			</div>
		</section>
  </body>
</html>
