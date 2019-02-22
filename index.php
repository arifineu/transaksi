<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
  </head>
  <body>
    <section class="hero is-fullheight is-light is-bold">
      <div class="hero-body">
        <div class="container" style="max-width:520px">
          <div class="tile is-vertical">
            <div class="box" style="border-radius: 20px">
              <p class="subtitle has-text-centered">Login Untuk Melanjutkan</p>
              <form action="" method="post">
                <div class="field">
                  <label class="label">Username</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input is-rounded" type="text" name="nama_user" placeholder="nama user" required>
                    <span class="icon is-small is-left">
                      <i class="fas fa-user"></i>
                    </span>
                  </div>
                </div>
                <div class="field">
                  <label class="label">Password</label>
                  <p class="control has-icons-left">
                    <input class="input is-rounded" type="password" name="password" placeholder="Password" required>
                    <span class="icon is-small is-left">
                      <i class="fas fa-lock"></i>
                    </span>
                  </p>
                </div>
                <br>
                <div class="buttons is-right">
                  <button class="button is-link is-rounded" type="submit" name="submit"><i class="fas fa-sign-in-alt"></i>&nbspLogin</button>
                  <button class="button is-danger is-outlined is-rounded" type="reset"><i class="fas fa-eraser"></i>&nbspReset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="css/fontawesome/js/all.min.js"></script>
  </body>
</html>

<?php
  require_once 'config/connection.php';
  if (isset($_POST['submit'])){
  	$user = $_POST['nama_user'];
  	$pass = $_POST['password'];

  	$sql = mysqli_query($conn, "SELECT * FROM `user` WHERE `nama_user`='$user' AND `password`='$pass'");
  	$privileges = mysqli_fetch_array($sql);
  	if(mysqli_num_rows($sql)==0){
  		echo '<script language="javascript">alert("Username atau password salah!"); document.location="index.php"</script>';
  	}else{
  		if($privileges['jenis_user'] == 'admin'){
  			$_SESSION['admin']=$user;
				echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="pages/admin/"</script>';
  		}else{
  			$_SESSION['petugas']=$user;
  			echo '<script language="javascript">alert("Anda berhasil Login Petugas!"); document.location="pages/petugas/"</script>';
  		}
  	}
  }
?>
