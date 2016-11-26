<?php

namespace Shapes;

use Exceptions\PainterException;

class Shape {
	protected $prepared = false;
	protected $params = [];
	protected $requiredParams = ['color', 'borderWidth'];
	
	/**
	 * Основная логика подготовки фигуры для последующей передачи в обработчик вывода
	 * 
	 * @return $this
	 * @throws PainterException
	 */
	public function prepare() {
		if (!$this->isValid()) {
			throw new PainterException ('Shape is not valid');
		}
		
		return $this;
	}
	
	/**
	 * Возвращаем данные в пригодном для вывода виде
	 * 
	 * @return array
	 * @throws PainterException
	 */
	public final function getPreparedShape() {
		if (!$this->isPrepared()) {
			throw new PainterException ('Shape is not prepared');
		}
		
		// В тестовой реализации просто возвращаем параметры фигуры
		return $this->params;
	}
	
	/**
	 * Устанавливаем параметр по ключу
	 * 
	 * @param mixed $key идентификатор параметра
	 * @param mixed $value хначение параметра
	 * @return $this
	 */
	public function setParam ($key, $value) {
		if ($this->isParamRequired ($key)) {
			$this->params[$key] = $value;
		}

		return $this;
	}
	
	/**
	 * Устанавливаем массив параметров
	 * 
	 * @param array $params
	 * @return $this
	 */
	public function setParams (array $params) {
		foreach ($params as $key => $value) {
			$this->setParam ($key, $value);
		}
		
		return $this;
	}

	// TODO: семантически неверный метод, над этим местом надо подумать в будущих версиях
	/**
	 * Устанавливаем параметр только если он находится в списке необходимых
	 * 
	 * @param $param
	 * @return bool
	 */
	protected function isParamRequired ($param) {
		if (in_array ($param, $this->requiredParams)) {
			return true;
		}

		return false;
	}
	
	/**
	 * Проверка на то, заданы ли все необходимы параметры
	 * 
	 * @return bool
	 */
	protected final function isValid() {
		foreach ($this->requiredParams as $k => $v) {
			if (!isset ($this->params[$v])) {
				return false;
			}
		}
		
		return true;
	}
	
	/** 
	 * @return bool
	 */
	protected final function isPrepared() {
		return $this->prepared;
	}
}