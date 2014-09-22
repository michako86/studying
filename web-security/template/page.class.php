<?php
/*
 * Класс шаблонизации страницы
 */
class Page
{
	public $header = '';							// Шапка страницы
	public $footer = '';							// Подвал страницы
	public $headers = array							// Заголовки страницы
	(
		'Content-type' => 'text/html; charset=UTF-8',
	);
	public $defaultProperties = array();			// Свойства шаблона по умолчанию
	public $navigationLinks = array();
	
	
	/*
	 * Метод отправляет заголовки
	 */
	public function sendHeaders()
	{
		foreach ($this->headers as $header => $value)
			header($header . ': ' . $value);
	}	
	
	/*
	 * Метод выводит шапку страницы
	 */
	public function showHeader()
	{
		// Отправляем заголовки
		$this->sendHeaders();	
		
		// Применяем дефолтовые свойства
		foreach($this->defaultProperties as $defaultProperty => $defaultValue)
			$this->setProperty($defaultProperty, $defaultValue);
		// Формируем навигацию
		$this->setProperty('%NAVIGATION%', $this->getNavigationHTML('<li>', '</li>'));
		
		// Выводим шапку
		echo $this->header;
	}
	
	/*
	 * Метод выводит шапку страницы
	 */
	public function showFooter()
	{
		echo $this->footer;
	}	
	
	
	/*
	 * Метод заменяет указанное свойство в шаблоне на указанное значение
	 */
	public function setProperty($property, $value='')
	{
		// Если дефолтовые свойства не применены, применяем их
		if (!$this->defaultPropertiesApplied)
		{

			$this->defaultPropertiesApplied = true;
		}
		
		$this->header = str_replace($property, $value, $this->header);
		$this->footer = str_replace($property, $value, $this->footer);
	}		
	
		/*
	 * Метод выводит шапку страницы
	 */
	public function getNavigationHTML($startString = '', $endString = ',')
	{
		$html = '';
		foreach($this->navigationLinks as $link => $text)
			$html .= $startString . "<a href=\"$link\">$text</a>" . $endString;
		return $html;
	}	
	
	
}
?>