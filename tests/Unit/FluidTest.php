<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers \McArdle\Traits\fluent.php
 */
final class FluidTest extends TestCase{

	/**
	 * @test
	 */
	public function it_returns_a_string_with_4_lower_case_chars(): void{
		$password = \McArdle\PasswordGenerator::init()->lowercase(4)->generate();
		$this->assertSame(strlen($password), 4);
		$this->assertMatchesRegularExpression('/[a-zæøå]{4}/', $password);
	}

	/**
	 * @test
	 */
	public function it_returns_a_string_with_4_upper_case_chars(): void{
		$password = \McArdle\PasswordGenerator::init()->uppercase(4)->generate();
		$this->assertSame(strlen($password), 4);
		$this->assertMatchesRegularExpression('/[A-ZÆØÅ]{4}/', $password);
	}

	/**
	 * @test
	 */
	public function it_returns_a_string_with_4_numbers(): void{
		$password = \McArdle\PasswordGenerator::init()->number(4)->generate();
		$this->assertSame(strlen($password), 4);
		$this->assertMatchesRegularExpression('/[0-9]{4}/', $password);
	}

	/**
	 * @test
	 */
	public function it_returns_a_string_with_4_special_chars(): void{
		$password = \McArdle\PasswordGenerator::init()->special(4)->generate();
		$this->assertSame(strlen($password), 4);
		$this->assertMatchesRegularExpression('/[<>{}(),.$@!\/?]{4}/', $password);
	}

	/**
	 * @test
	 */
	public function it_returns_a_string_with_8_chars_when_using_fluid_pattern(): void{
		$password = \McArdle\PasswordGenerator::init()
		  	->special()
			->number()
			->uppercase()
			->lowercase()
		  	->generate();
		$this->assertSame(strlen($password), 8);
	}
}