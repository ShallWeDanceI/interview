<?php

use \Exceptions\PainterException;

class Painter {	
	private $shape;
	private $format;
	
	/**
	 * Задаем нужный класс для обработки фигуры
	 * 
	 * @param string $type Соответствует имени класса обработчика фигуры
	 * @param array $params Массив параметров, необходимых для настройки фигуры
	 * @return $this
	 * @throws PainterException
	 */
	public function setShape ($type, $params = array()) {
		$className = '\Shapes\\'.ucfirst(strtolower($type));
		$this->shape = new $className;

		if (!$this->shape instanceof \Shapes\Shape) {
			throw new PainterException ('Wrong shape type');
		}

		$this->shape->setParams ($params)->prepare();

		return $this;
	}
	
	/**
	 * Задаем нужный класс для обработки вывода фигуры
	 * 
	 * @param string $format Соответствует имени класса обработчика вывода
	 * @param array $params Массив параметров, необходимых для настройки обработчика вывода
	 * @return $this
	 * @throws PainterException
	 */
	public function setOutputFromat ($format, $params = array()) {
		$className = '\Output\\'.ucfirst(strtolower($format));
		$this->format = new $className;
		
		if (!$this->format instanceof \Output\Format) {
			throw new PainterException ('Wrong output format');
		}
		
		$this->format->setParams ($params);
		
		return $this;
	}
	
	/**
	 * Выполняем вывод заданной фигуры посредством заданного обработчика
	 * 
	 * @return $this
	 * @throws PainterException
	 */
	public function draw() {
		if (!$this->isValid()) {
			throw new PainterException ('Shape or Output format is not set');
		}
		
		$this->format->execute ($this->shape);
		
		return $this;
	}
	
	/**
	 * Проверка на то, что все необходимые настройки заданы
	 * 
	 * @return bool
	 */
	private function isValid() {
		if (!is_null ($this->shape) && !is_null ($this->format)) {
			return true;
		}
		
		return false;
	}
}