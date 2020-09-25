<?php

use PHPUnit\Framework\TestCase;

final class LowerCaseGeneratorTest extends TestCase{

	/**
	 * @test
	 * @throws Exception
	 */
	public function it_returns_a_password_with_4_lower_case_chars_when_lower_case_generator_is_called_with_length_4(): void{
		$lowerCaseGenerator = new \McArdle\Generators\LowerCaseGenerator(4);
		$this->assertSame(strlen($lowerCaseGenerator->generate()), 4);
		$this->assertRegExp('/[a-zæøå]{4}/', $lowerCaseGenerator->generate());
	}

	/**
	 * @test
	 * @throws ReflectionException
	 */
	public function it_returns_a_password_with_4_lower_case_chars_when_password_generator_is_called_with_lower_case_generator_and_length_of_4(): void{
		$lowerCaseGenerator = new \McArdle\Generators\LowerCaseGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$lowerCaseGenerator]);
		$password = $passwordGenerator->generate();
		$this->assertSame(strlen($password), 4);
		$this->assertRegExp('/[a-zæøå]{4}/', $password);
	}

	/**
	 * @test
	 * @throws ReflectionException
	 */
	public function it_returns_a_password_with_4_lower_case_chars_when_password_generator_is_called_with_length_of_4_with_lower_case_generator_with_length_of_4(): void{
		$lowerCaseGenerator = new \McArdle\Generators\LowerCaseGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$lowerCaseGenerator]);
		$password = $passwordGenerator->generate(4);
		$this->assertSame(strlen($password), 4);
		$this->assertRegExp('/[a-zæøå]{4}/', $password);
	}
}
