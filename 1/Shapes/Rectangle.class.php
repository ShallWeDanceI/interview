<?php

namespace Shapes;

class Rectangle extends Shape {
	protected $requiredParams = ['color', 'borderWidth', 'width', 'height'];
	
	public function prepare() {
		parent::prepare();
		
		/*
		 * TODO: Код для обработки всех параметров прямоугольника и приведения их к состоянию,
		 * пригодному для передеачи на вывод
		 * */
		
		$this->prepared = true;
		
		return $this;
	}
}