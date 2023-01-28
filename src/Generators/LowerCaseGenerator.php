<?php

namespace McArdle\Generators;

class LowerCaseGenerator extends Generator implements GeneratorInterface{

	public function __construct(int $length){
		$this->length = $length;
		$this->chars = 'abcdefghijklmnopqrstuvwxyz';
	}
}