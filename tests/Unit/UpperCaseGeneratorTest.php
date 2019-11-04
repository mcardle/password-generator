<?php

use PHPUnit\Framework\TestCase;

final class UpperCaseGeneratorTest extends TestCase{

	/**
	 * @test
	 * @throws Exception
	 */
	public function it_returns_a_password_with_4_upper_case_chars_when_uppercase_generator_is_called_with_length_4(): void{
		$upperCaseGenerator = new \McArdle\Generators\UpperCaseGenerator(4);
		$this->assertSame(strlen($upperCaseGenerator->generate()), 4);
		$this->assertRegExp('/[A-ZÆØÅ]{4}/', $upperCaseGenerator->generate());
	}

	/**
	 * @test
	 * @throws ReflectionException
	 */
	public function it_returns_a_password_with_4_upper_case_chars_when_password_generator_is_called_with_upper_case_generator_and_length_of_4(): void{
		$upperCaseGenerator = new \McArdle\Generators\UpperCaseGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$upperCaseGenerator]);
		$password = $passwordGenerator->generate();
		$this->assertSame(strlen($password), 4);
		$this->assertRegExp('/[A-ZÆØÅ]{4}/', $password);
	}

	/**
	 * @test
	 * @throws ReflectionException
	 */
	public function it_returns_a_password_with_4_upper_case_chars_when_password_generator_is_called_with_length_of_4_with_upper_case_generator_with_length_of_4(): void{
		$upperCaseGenerator = new \McArdle\Generators\UpperCaseGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$upperCaseGenerator]);
		$password = $passwordGenerator->generate(4);
		$this->assertSame(strlen($password), 4);
		$this->assertRegExp('/[A-ZÆØÅ]{4}/', $password);
	}
}
