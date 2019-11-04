<?php

namespace McArdle\Generators;

/**
 * Class NumberGenerator
 * @package McArdle\Generators
 */
class NumberGenerator extends Generator implements GeneratorInterface{

	/**
	 * NumberGenerator constructor.
	 * @param $length
	 */
	public function __construct($length){
		$this->length = $length;
		$this->chars = '0123456789';
	}
}