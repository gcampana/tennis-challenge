<?php

namespace App\Domain\Model;

class MatchWomanFactory extends MatchFactory
{
    public function createMatchGame(): MatchGame
    {
        return new MatchSingles($this->createPointCalculator());
    }

    public function createPointCalculator(): PointCalculator
    {
        return new PointCalculatorForWomen();
    }
}