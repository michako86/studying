<?php
	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['HTTP_HOST']."/php-l4/demo/curl/test.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    curl_close($curl);
    print $result;
?>