<?php

header('Content-Type: text/html;charset=utf-8');

$output = array();

function make_request($request_xml, &$output) {
    $opts = array(
        'http' => array(
            'method' => "POST",
            'header' => "User-Agent: PHPRPC/1.0\r\n" .
            "Content-Type: text/xml\r\n" .
            "Content-length: " . strlen($request_xml) . "\r\n",
            'content' => "$request_xml"
        )
    );
    $context = stream_context_create($opts);
    //$fp = fopen('http://localhost/php-l3/demo/xml-rpc/server.php', 'r', false, $context);
    //$retval = stream_get_contents($fp);
    $retval = file_get_contents('http://localhost/php-l3/xml-rpc/xml-rpc-server.php', false, $context);
    $data = xmlrpc_decode($retval);
    if (is_array($data) && xmlrpc_is_fault($data)) {
        $output[] = $data;
        
    } else {
        $output[] = unserialize(base64_decode($data));
    }
}
$id = "1";
$request_xml = xmlrpc_encode_request('getNewsById', array($id));
make_request($request_xml, $output);

var_dump($output);

