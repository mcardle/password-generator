<?php

use PHPUnit\Framework\TestCase;

final class NumberGeneratorTest extends TestCase{

	/**
	 * @test
	 * @throws Exception
	 */
	public function it_returns_a_password_with_4_numbers_when_number_generator_is_called_with_length_4(): void{
		$numberGenerator = new \McArdle\Generators\NumberGenerator(4);
		$this->assertSame(strlen($numberGenerator->generate()), 4);
		$this->assertRegExp('/[0-9]{4}/', $numberGenerator->generate());
	}

	/**
	 * @test
	 * @throws ReflectionException
	 */
	public function it_returns_a_password_with_4_numbers_when_password_generator_is_called_with_number_generator_and_length_of_4(): void{
		$numberGenerator = new \McArdle\Generators\NumberGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$numberGenerator]);
		$password = $passwordGenerator->generate();
		$this->assertSame(strlen($password), 4);
		$this->assertRegExp('/[0-9]{4}/', $password);
	}

	/**
	 * @test
	 * @throws ReflectionException
	 */
	public function it_returns_a_password_with_4_numbers_when_password_generator_is_called_with_length_of_4_with_number_generator_with_length_of_4(): void{
		$numberGenerator = new \McArdle\Generators\NumberGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$numberGenerator]);
		$password = $passwordGenerator->generate(4);
		$this->assertSame(strlen($password), 4);
		$this->assertRegExp('/[0-9]{4}/', $password);
	}
}
