<?php

namespace McArdle;

use McArdle\Traits\fluent;
use McArdle\Generators\{
	GeneratorInterface,
	NumberGenerator,
	LowerCaseGenerator,
	UpperCaseGenerator,
	SpecialCharsGenerator
};

/**
 * @phpstan-consistent-constructor
 */
class PasswordGenerator{
	use fluent;

	protected array $generators = [];

	public function __construct(array $generatorInstances = []){
		$this->setGenerators($generatorInstances);
	}

	public function setGenerators($generatorInstances = []): void{
		foreach($generatorInstances as $instance){
			$this->setGenerator($instance);
		}
	}

	public function setGenerator(GeneratorInterface $generator): self{
		$this->generators[] = $generator;
		return $this;
	}

	public function generate($length = null): string{
		$password = '';
		foreach($this->generators as $instance){
			$password .= $instance->generate();
			$password = str_shuffle($password);
		}

		if(!empty($length) && is_int($length)){
			return substr($password, 0, $length);
		}

		return $password;
	}

	public static function all($length = 8): string{

		if(empty($length) || !is_int($length) || $length < 1){
			$length = 8;
		}

		$generators = [
			NumberGenerator::class,
			UpperCaseGenerator::class,
			LowerCaseGenerator::class,
			SpecialCharsGenerator::class,
		];

		$each = ceil($length / count($generators));

		$instances = [];
		foreach($generators as $generator){
			$instances[] = new $generator($each);
		}

		return (new static($instances))->generate($length);
	}
}