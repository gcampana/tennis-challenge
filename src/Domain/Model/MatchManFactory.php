<?php

namespace App\Domain\Model;

class MatchManFactory extends MatchFactory
{
    public function createMatchGame(): MatchGame
    {
        return new MatchSingles($this->createPointCalculator());
    }

    public function createPointCalculator(): PointCalculator
    {
        return new PointCalculatorForMen();
    }
}