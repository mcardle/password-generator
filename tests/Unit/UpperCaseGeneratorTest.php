<?php

namespace McArdle\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\McArdle\Generators\Generator::class)]
#[CoversClass(\McArdle\Generators\UpperCaseGenerator::class)]
final class UpperCaseGeneratorTest extends TestCase{

    #[Test]
    public function it_returns_a_password_with_4_upper_case_chars_when_uppercase_generator_is_called_with_length_4(): void{
		$upperCaseGenerator = new \McArdle\Generators\UpperCaseGenerator(4);
		self::assertSame(4, strlen($upperCaseGenerator->generate()));
		self::assertMatchesRegularExpression('/[A-Z]{4}/', $upperCaseGenerator->generate());
	}

    #[Test]
    public function it_returns_a_password_with_4_upper_case_chars_when_password_generator_is_called_with_upper_case_generator_and_length_of_4(): void{
		$upperCaseGenerator = new \McArdle\Generators\UpperCaseGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$upperCaseGenerator]);
		$password = $passwordGenerator->generate();
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[A-Z]{4}/', $password);
	}

    #[Test]
    public function it_returns_a_password_with_4_upper_case_chars_when_password_generator_is_called_with_length_of_4_with_upper_case_generator_with_length_of_4(): void{
		$upperCaseGenerator = new \McArdle\Generators\UpperCaseGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$upperCaseGenerator]);
		$password = $passwordGenerator->generate(4);
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[A-Z]{4}/', $password);
	}
}
