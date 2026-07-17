<?php

namespace McArdle\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\McArdle\Traits\Fluent::class)]
final class FluidTest extends TestCase{

    #[Test]
    public function it_returns_a_string_with_4_lower_case_chars(): void{
		$password = \McArdle\PasswordGenerator::init()->lowercase(4)->generate();
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[a-z]{4}/', $password);
	}

    #[Test]
    public function it_returns_a_string_with_4_upper_case_chars(): void{
		$password = \McArdle\PasswordGenerator::init()->uppercase(4)->generate();
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[A-Z]{4}/', $password);
	}

    #[Test]
    public function it_returns_a_string_with_4_numbers(): void{
		$password = \McArdle\PasswordGenerator::init()->number(4)->generate();
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[0-9]{4}/', $password);
	}

    #[Test]
    public function it_returns_a_string_with_4_special_chars(): void{
		$password = \McArdle\PasswordGenerator::init()->special(4)->generate();
		self::assertSame(4, strlen($password));
		self::assertMatchesRegularExpression('/[<>{}(),.$@!\/?]{4}/', $password);
	}

    #[Test]
    public function it_returns_a_string_with_8_chars_when_using_fluid_pattern(): void{
		$password = \McArdle\PasswordGenerator::init()
		  	->special()
			->number()
			->uppercase()
			->lowercase()
		  	->generate();
		self::assertSame(8, strlen($password));
	}
}