<?php

namespace Output;

use Shapes\Shape;

class Image extends Format {
	private $params;
	
	/**
	 * @param array $params Массив параметров, необходимых для настройки обработчика вывода
	 * @return $this
	 */
	public function setParams (array $params) {
		foreach ($params as $key => $value) {
			$this->params[$key] = $value;
		}
		
		return $this;
	}
	
	/**
	 * Осуществляем вывод звдвнной фигуры в заданном вормате
	 * 
	 * @param Shape $shape 
	 * @throws \Exceptions\PainterException
	 */
	public function execute (Shape $shape) {
		// Код для вывода картинки в качестве изображения

		// Тест
		echo get_class($shape).':<br />';
		echo get_class().':';
		echo '<pre>';
		var_dump ($this->params);
		var_dump ($shape->getPreparedShape());
		echo '</pre>';
	}
}