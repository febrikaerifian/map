<?php
$koneksi = mysqli_connect("");
            if (!$koneksi) {
                die(mysql_error());
            }
            mysqli_select_db($koneksi,"");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));			
$option_chosen=$_POST['option_chosen'];
?>
