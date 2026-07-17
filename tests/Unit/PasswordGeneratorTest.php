<?php

namespace McArdle\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\McArdle\Generators\Generator::class)]
#[CoversClass(\McArdle\PasswordGenerator::class)]
final class PasswordGeneratorTest extends TestCase{

    #[Test]
    public function it_returns_a_password_32_characters_password_when_called_statically_with_param32(): void{
		$password = \McArdle\PasswordGenerator::all(32);
		self::assertSame(32, strlen($password));
	}

    #[Test]
    public function it_returns_a_password_8_characters_password_when_called_statically_and_no_parameter(): void{
		$password = \McArdle\PasswordGenerator::all();
		self::assertSame(8, strlen($password));
	}

    #[Test]
    public function is_returns_a_password_of_the_sum_defined_in_generators(): void{
		$generators = [
			new \McArdle\Generators\NumberGenerator(4),
			new \McArdle\Generators\LowerCaseGenerator(8),
		];

		$password = \McArdle\PasswordGenerator::init($generators)->generate();
		self::assertSame(12, strlen($password));
	}
}
