<?php

header('Content-Type: text/html; charset=utf-8');
try {
    // Создание SOAP-клиента
    $client = new SoapClient("http://localhost/php-l3/soap/news.wsdl");

    // Посылка SOAP-запроса c получением результат
    $result = $client->getNewsCount();
    echo "<p>Всего новостей: $result </p>";
    
    $result = $client->getNewsCountByCat(1);
    echo "<p>Всего новостей в категории Политика: $result </p>";
    
    $result = $client->getNewsById(10);
    $news = unserialize(base64_decode($result));
    
    var_dump($news);
    
    
} catch (SoapFault $e) {
    echo 'Операция '.$e->faultcode.' вернула ошибку '.$e->getMessage();
}
?>