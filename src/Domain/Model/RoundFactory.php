<?php

namespace App\Domain\Model;

class RoundFactory
{
    public static function create(MatchFactory $matchFactory): Round
    {
        return new RoundSinglesDirect($matchFactory);
    }
}