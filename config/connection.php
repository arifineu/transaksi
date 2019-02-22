<?php
session_start();
$conn = mysqli_connect ("localhost", "root", "", "transaksi");
if ($conn){
  echo "<b> </b>";
}else{
  die ("<b> Koneksi Gagal </b>");
}
?>
