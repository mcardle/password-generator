<?php

declare(strict_types=1);

namespace McArdle;

use McArdle\Generators\{
	GeneratorInterface,
	NumberGenerator,
	LowerCaseGenerator,
	UpperCaseGenerator,
	SpecialCharGenerator
};

/**
 * @phpstan-consistent-constructor
 * @psalm-consistent-constructor
 */
class PasswordGenerator{
	use \McArdle\Traits\Fluent;

	/** @var array<int, GeneratorInterface> */
	protected array $generators = [];

	/** @param array<int, GeneratorInterface> $generatorInstances */
	public function __construct(array $generatorInstances = []){
		$this->setGenerators($generatorInstances);
	}

	/** @param array<int, GeneratorInterface> $generatorInstances */
	public function setGenerators(array $generatorInstances = []): void{
		foreach($generatorInstances as $instance){
			$this->setGenerator($instance);
		}
	}

	public function setGenerator(GeneratorInterface $generator): self{
		$this->generators[] = $generator;
		return $this;
	}

	public function generate(?int $length = null): string{
		$password = '';
		foreach($this->generators as $instance){
			$password .= $instance->generate();
			$password = str_shuffle($password);
		}

		if($length !== null){
			return substr($password, 0, $length);
		}

		return $password;
	}

	public static function all(?int $length = null): string{

		if($length === null){
			$length = 8;
		}

		$generators = [
			NumberGenerator::class,
			UpperCaseGenerator::class,
			LowerCaseGenerator::class,
			SpecialCharGenerator::class,
		];

		$each = (int)ceil($length / count($generators));

		$instances = [];
		foreach($generators as $generator){
			$instances[] = new $generator($each);
		}

		return new static($instances)->generate($length);
	}
}