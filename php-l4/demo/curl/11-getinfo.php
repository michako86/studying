<pre>
<?php
	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"http://".$_SERVER['HTTP_HOST']."/php-l4/demo/curl/test.txt");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_exec ($curl);
	
    print_r(curl_getinfo($curl));
	
	curl_close ($curl);
	
?>