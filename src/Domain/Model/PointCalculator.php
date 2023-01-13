<?php

namespace App\Domain\Model;


interface PointCalculator
{
    /**
     * @param Player $player
     * @return int
     */
    public function calculateProbabilityToWin(Player $player): int;

}