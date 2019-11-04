<?php

namespace McArdle\Generators;

/**
 * Class NumberGenerator
 * @package McArdle\Generators
 */
abstract class Generator{

	/**
	 * @var int
	 */
	protected $length;

	/**
	 * @var string
	 */
	protected $chars;

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function generate(): string{
		$string = '';
		for($i=0; $i<$this->length; $i++){
			$available = str_shuffle($this->chars);
			$string .= $available[0];
		}
		return $string;
	}
}