<?php

declare(strict_types=1);

namespace McArdle\Traits;

use McArdle\Generators\GeneratorInterface;
use McArdle\Generators\LowerCaseGenerator;
use McArdle\Generators\NumberGenerator;
use McArdle\Generators\SpecialCharGenerator;
use McArdle\Generators\UpperCaseGenerator;

/**
 * @phpstan-consistent-constructor
 */
trait Fluent{

	/** @param array<int, GeneratorInterface> $generatorInstances */
	public static function init(array $generatorInstances = []): self{
		return new static($generatorInstances);
	}

	public function number(int $amount = 2): self{
		$this->generators[] = new NumberGenerator($amount);
		return $this;
	}

	public function lowercase(int $amount = 2): self{
		$this->generators[] = new LowerCaseGenerator($amount);
		return $this;
	}

	public function uppercase(int $amount = 2): self{
		$this->generators[] = new UpperCaseGenerator($amount);
		return $this;
	}

	public function special(int $amount = 2): self{
		$this->generators[] = new SpecialCharGenerator($amount);
		return $this;
	}
}