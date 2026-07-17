<?php

namespace McArdle\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\McArdle\Generators\Generator::class)]
#[CoversClass(\McArdle\Generators\NumberGenerator::class)]
final class NumberGeneratorTest extends TestCase{

    #[Test]
    public function it_returns_a_password_with_4_numbers_when_number_generator_is_called_with_length_4(): void{
		$numberGenerator = new \McArdle\Generators\NumberGenerator(4);
		self::assertSame(4, strlen($numberGenerator->generate()));
		self::assertMatchesRegularExpression('/[0-9]{4}/', $numberGenerator->generate());
	}

    #[Test]
    public function it_returns_a_password_with_4_numbers_when_password_generator_is_called_with_number_generator_and_length_of_4(): void{
		$numberGenerator = new \McArdle\Generators\NumberGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$numberGenerator]);
		$password = $passwordGenerator->generate();
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[0-9]{4}/', $password);
	}

    #[Test]
    public function it_returns_a_password_with_4_numbers_when_password_generator_is_called_with_length_of_4_with_number_generator_with_length_of_4(): void{
		$numberGenerator = new \McArdle\Generators\NumberGenerator(4);
		$passwordGenerator = new \McArdle\PasswordGenerator([$numberGenerator]);
		$password = $passwordGenerator->generate(4);
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[0-9]{4}/', $password);
	}
}
