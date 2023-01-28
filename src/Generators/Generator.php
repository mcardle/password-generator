<?php

namespace McArdle\Generators;

abstract class Generator{

	protected int $length;

	protected string $chars;

	public function generate(): string{
		$string = '';
		for($i=0; $i<$this->length; $i++){
			$available = str_shuffle($this->chars);
			$string .= $available[0];
		}
		return $string;
	}
}