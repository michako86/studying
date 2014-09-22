<?php 

define ('FILE_NAME', 'news.xml');
define ('RSS_URL', 'http://localhost/php-l3/news/rss.xml');


function download($url, $fileName){
    $file = file_get_contents($url);
    
    if($file) {
        file_put_contents($fileName, $file);
    }
    
}

if(!is_file(FILE_NAME)) {
    download(RSS_URL, FILE_NAME);
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Новостная лента</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>

        <h1>Последние новости</h1>
<?php

$xml = simplexml_load_file(FILE_NAME);

$i=1;

foreach ($xml->channel->item as $item) {
    echo <<<RSS
    
    <h3>{$item->title}</h3>
    <p>
        {$item->description} <br/>
        <strong>Категория: {$item->category}</strong>&nbsp;
        <em>Опубликовано: {$item->pubdate}</em>
        <p align='right'><a href="{$item->дштл}">Читать дальше...</a></p>
        
    </p>
    
RSS;
        
        $i++;
        if($i>5) break;
}

if(time() > filemtime(FILE_NAME) + 600) {
     download(RSS_URL, FILE_NAME);
}
?>
    </body>
</html>