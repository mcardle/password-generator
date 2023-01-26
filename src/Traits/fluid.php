<?php

namespace McArdle\Traits;

use McArdle\Generators\LowerCaseGenerator;
use McArdle\Generators\NumberGenerator;
use McArdle\Generators\SpecialCharsGenerator;
use McArdle\Generators\UpperCaseGenerator;

trait fluid{

	public static function init(): self{
		return new static();
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
		$this->generators[] = new SpecialCharsGenerator($amount);
		return $this;
	}
}