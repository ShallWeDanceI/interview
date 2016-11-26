<?php

namespace Output;

use Shapes\Shape;

abstract class Format {
	public function setParams(array $params) {
	}
	
	public function execute(Shape $shape) {
	}
}