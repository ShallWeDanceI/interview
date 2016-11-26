<?php

namespace Shapes;

class Circle extends Shape {
	protected $requiredParams = ['color', 'borderWidth', 'radius'];
	
	public function prepare() {
		parent::prepare();
		
		/*
		 * TODO: Код для обработки всех параметров круга и приведения их к состоянию,
		 * пригодному для передеачи на вывод
		 * */
		
		$this->prepared = true;
		
		return $this;
	}
}