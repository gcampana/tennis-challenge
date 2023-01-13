<?php

namespace App\Domain\Model;


class PointCalculatorForWomen implements PointCalculator
{
    public function calculateProbabilityToWin(Player $player): int
    {
        return $player->getSkill() + $player->getReactionTime() + random_int(1,100);
    }
}