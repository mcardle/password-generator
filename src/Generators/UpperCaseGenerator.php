<?php

namespace McArdle\Generators;

/**
 * Class UpperCaseGenerator
 * @package McArdle\Generators
 */
class UpperCaseGenerator extends Generator implements GeneratorInterface{

	/**
	 * NumberGenerator constructor.
	 * @param $length
	 */
	public function __construct($length){
		$this->length = $length;
		$this->chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	}
}