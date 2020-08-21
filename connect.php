<?php
$koneksi = mysqli_connect("ajikusbandono.ddns.net:53333","aji", "G4nt3N6aNdK3r3n.!");
            if (!$koneksi) {
                die(mysql_error());
            }
            mysqli_select_db($koneksi,"zte_swap");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));			
$option_chosen=$_POST['option_chosen'];
?>