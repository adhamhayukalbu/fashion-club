<?php
	function connect_to_db($host, $user, $pass, $db){
	    $connected = mysqli_connect($host, $user, $pass, $db);
	    if(!$connected){
	        die('Gagal Koneksi: ' . mysqli_error($koneksi));
	    }
	    return $connected; 
	}
?>