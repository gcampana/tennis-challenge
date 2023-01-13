<?php

namespace App\Domain\Model;


class PointCalculatorForMen implements PointCalculator
{
    public function calculateProbabilityToWin(Player $player): int
    {
        return $player->getSkill() + $player->getStrength() + $player->getVelocity() + random_int(1,100);
    }
}