<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers \McArdle\Generators\SpecialCharsGenerator
 * @covers \McArdle\Generators\Generator
 */
final class SpecialCharsGeneratorTest extends TestCase{

	/**
	 * @test
	 */
	public function it_returns_a_password_with_4_special_chars_when_special_char_generator_is_called_with_length_4(): void{
		$specialCharGenerator = new \McArdle\Generators\SpecialCharsGenerator(4);
		$this->assertSame(strlen($specialCharGenerator->generate()), 4);
		$this->assertMatchesRegularExpression('/[<>{}(),.$@!\/?]{4}/', $specialCharGenerator->generate());
	}

	/**
	 * @test
	 */
	public function it_returns_a_password_with_4_special_chars_when_password_generator_is_called_with_special_char_generator_and_length_of_4(): void{
		$specialCharGenerator = new \McArdle\Generators\SpecialCharsGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$specialCharGenerator]);
		$password = $passwordGenerator->generate();
		$this->assertSame(strlen($password), 4);
		$this->assertMatchesRegularExpression('/[<>{}(),.$@!\/?]{4}/', $password);
	}

	/**
	 * @test
	 */
	public function it_returns_a_password_with_4_special_chars_when_password_generator_is_called_with_length_of_4_with_special_char_generator_with_length_of_4(): void{
		$specialCharGenerator = new \McArdle\Generators\SpecialCharsGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$specialCharGenerator]);
		$password = $passwordGenerator->generate(4);
		$this->assertSame(strlen($password), 4);
		$this->assertMatchesRegularExpression('/[<>{}(),.$@!\/?]{4}/', $password);
	}
}
