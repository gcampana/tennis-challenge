<?php

namespace App\Domain\Model;

abstract class MatchGame
{
    protected PointCalculator $pointCalculator;

    public abstract function play(): void;

    public abstract function getWinner(): Player;
}