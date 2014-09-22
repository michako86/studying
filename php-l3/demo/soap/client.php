<?php
header('Content-Type: text/html; charset=utf-8');
	try {
		// Создание SOAP-клиента
		$client = new SoapClient("http://localhost/php-l3/demo/soap/stock.wsdl");
		
		// Посылка SOAP-запроса c получением результат
		$result = $client->getStock("3");
		echo "Текущий запас на складе: ", $result;
	} catch (SoapFault $exception) {
		echo $exception->getMessage();	
	}
?>