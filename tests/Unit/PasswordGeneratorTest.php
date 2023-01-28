<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers \McArdle\PasswordGenerator
 * @covers \McArdle\Generators\Generator
 */
final class PasswordGeneratorTest extends TestCase{

	/**
	 * @test
	 */
	public function it_returns_a_password_32_characters_password_when_called_statically_with_param32(): void{
		$password = \McArdle\PasswordGenerator::all(32);
		$this->assertSame(strlen($password), 32);
	}

	/**
	 * @test
	 */
	public function it_returns_a_password_8_characters_password_when_called_statically_and_no_parameter(): void{
		$password = \McArdle\PasswordGenerator::all();
		$this->assertSame(strlen($password), 8);
	}

	/**
	 * @test
	 */
	public function is_returns_a_password_of_the_sum_defined_in_generators(): void{
		$generators = [
			new McArdle\Generators\NumberGenerator(4),
			new McArdle\Generators\LowerCaseGenerator(8),
		];

		$password = \McArdle\PasswordGenerator::init($generators)->generate();
		$this->assertSame(12, strlen($password));
	}
}
