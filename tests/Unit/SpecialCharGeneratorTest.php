<?php

namespace McArdle\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\McArdle\Generators\Generator::class)]
#[CoversClass(\McArdle\Generators\SpecialCharGenerator::class)]
final class SpecialCharGeneratorTest extends TestCase{

    #[Test]
    public function it_returns_a_password_with_4_special_chars_when_special_char_generator_is_called_with_length_4(): void{
		$specialCharGenerator = new \McArdle\Generators\SpecialCharGenerator(4);
		self::assertSame(4, strlen($specialCharGenerator->generate()));
		self::assertMatchesRegularExpression('/[<>{}(),.$@!\/?]{4}/', $specialCharGenerator->generate());
	}

    #[Test]
    public function it_returns_a_password_with_4_special_chars_when_password_generator_is_called_with_special_char_generator_and_length_of_4(): void{
		$specialCharGenerator = new \McArdle\Generators\SpecialCharGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$specialCharGenerator]);
		$password = $passwordGenerator->generate();
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[<>{}(),.$@!\/?]{4}/', $password);
	}

    #[Test]
    public function it_returns_a_password_with_4_special_chars_when_password_generator_is_called_with_length_of_4_with_special_char_generator_with_length_of_4(): void{
		$specialCharGenerator = new \McArdle\Generators\SpecialCharGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$specialCharGenerator]);
		$password = $passwordGenerator->generate(4);
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[<>{}(),.$@!\/?]{4}/', $password);
	}
}
