<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers \McArdle\PasswordGenerator
 */
final class PasswordGeneratorTest extends TestCase{

	/**
	 * @test
	 * @throws Exception
	 */
	public function it_returns_a_password_8_characters_when_called_static_method_all_with_param_8(): void{
		$password = \McArdle\PasswordGenerator::all(8);
		$this->assertSame(strlen($password), 8);
	}
}
