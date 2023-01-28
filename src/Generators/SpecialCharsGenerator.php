<?php

namespace McArdle\Generators;

class SpecialCharsGenerator extends Generator implements GeneratorInterface{

	public function __construct(int $length){
		$this->length = $length;
		$this->chars = '<>{}(),.$@!/?';
	}
}