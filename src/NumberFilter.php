<?php

namespace App;

class NumberFilter
{
    private array $numbers = [];

    public function addNumber(int|float $num): void
    {
        $this->numbers[] = $num;
    }

    public function getEven(): array
    {
        return array_filter($this->numbers, fn($n) => is_int($n) && $n % 2 === 0);
    }

    public function getOdd(): array
    {
        return array_filter($this->numbers, fn($n) => is_int($n) && $n % 2 !== 0);
    }

    public function getGreaterThan(float $value): array
    {
        return array_filter($this->numbers, fn($n) => $n > $value);
    }
}
