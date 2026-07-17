<?php

namespace McArdle\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\McArdle\Generators\LowerCaseGenerator::class)]
final class LowerCaseGeneratorTest extends TestCase{

    #[Test]
    public function it_returns_a_password_with_4_lower_case_chars_when_lower_case_generator_is_called_with_length_4(): void{
		$lowerCaseGenerator = new \McArdle\Generators\LowerCaseGenerator(4);
		self::assertSame(4, strlen($lowerCaseGenerator->generate()));
		self::assertMatchesRegularExpression('/[a-z]{4}/', $lowerCaseGenerator->generate());
	}

    #[Test]
    public function it_returns_a_password_with_4_lower_case_chars_when_password_generator_is_called_with_lower_case_generator_and_length_of_4(): void{
		$lowerCaseGenerator = new \McArdle\Generators\LowerCaseGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$lowerCaseGenerator]);
		$password = $passwordGenerator->generate();
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[a-z]{4}/', $password);
	}

    #[Test]
    public function it_returns_a_password_with_4_lower_case_chars_when_password_generator_is_called_with_length_of_4_with_lower_case_generator_with_length_of_4(): void{
		$lowerCaseGenerator = new \McArdle\Generators\LowerCaseGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$lowerCaseGenerator]);
		$password = $passwordGenerator->generate(4);
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[a-z]{4}/', $password);
	}
}
