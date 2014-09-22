<?php
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['HTTP_HOST']."/php-l4/demo/curl/test.php");
	curl_exec($curl);
	curl_close($curl);
?>