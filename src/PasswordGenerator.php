<?php

namespace McArdle;

use ReflectionClass;
use ReflectionException;
use InvalidArgumentException;
use McArdle\Generators\{NumberGenerator, LowerCaseGenerator, UpperCaseGenerator, SpecialCharsGenerator};

/**
 * Class PasswordGenerator
 * @package mcardle
 */
class PasswordGenerator{

	/**
	 * @var array
	 */
	protected $generators = [];

	/**
	 * PasswordGenerator constructor.
	 * @param array $generatorInstances
	 * @throws ReflectionException
	 */
	public function __construct(array $generatorInstances){
		foreach($generatorInstances as $instance){
			$reflect = new ReflectionClass($instance);
			if($reflect->implementsInterface(\McArdle\Generators\GeneratorInterface::class) === false){
				throw new InvalidArgumentException('Generator "' . get_class($instance) . '" not supported');
			}
			$this->generators[] = $instance;
		}
	}

	/**
	 * @param null $length
	 * @return string
	 */
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

	/**
	 * @param int $length
	 * @return string
	 * @throws ReflectionException
	 */
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

		$password = new static($instances);
		return $password->generate($length);
	}
}