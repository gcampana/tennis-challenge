<?php

namespace App\Domain\Model;

abstract class MatchFactory
{
    public abstract function createMatchGame(): MatchGame;

    public abstract function createPointCalculator(): PointCalculator;
}