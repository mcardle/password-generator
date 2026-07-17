<?php

declare(strict_types=1);

namespace McArdle\Generators;

class SpecialCharGenerator extends Generator implements GeneratorInterface{
	public function __construct(int $length){
		$this->length = $length;
		$this->chars = '<>{}(),.$@!/?';
	}
}