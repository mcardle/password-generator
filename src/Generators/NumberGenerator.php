<?php

namespace McArdle\Generators;

class NumberGenerator extends Generator implements GeneratorInterface{

	public function __construct(int $length){
		$this->length = $length;
		$this->chars = '0123456789';
	}
}