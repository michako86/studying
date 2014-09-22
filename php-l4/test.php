<?php

$start = memory_get_usage();
//$arr = range(1, 100000);

$arr = new SplFixedArray(100000);

for($i=0; $i<100000; ++$i){
    $arr[$i] = $i;
}

echo (memory_get_usage() - $start)/(1024*1024);
