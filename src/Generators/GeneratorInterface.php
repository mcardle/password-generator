<?php

declare(strict_types=1);

namespace McArdle\Generators;

interface GeneratorInterface{
	public function generate(): string;
}