<?php

namespace App\Domain\Model;


class MatchSingles extends MatchGame
{
    private Player $playerOne;
    private Player $playerTwo;
    private Player $winner;

    public function __construct(PointCalculator $pointCalculator)
    {
        $this->pointCalculator = $pointCalculator;
    }

    public function setPlayerOne(Player $player): void
    {
        $this->playerOne = $player;
    }

    public function setPlayerTwo(Player $player): void
    {
        $this->playerTwo = $player;
    }

    public function play(): void
    {
        $playerOnePoints = $this->pointCalculator->calculateProbabilityToWin($this->playerOne);
        $playerTwoPoints = $this->pointCalculator->calculateProbabilityToWin($this->playerTwo);
        $this->winner = $playerOnePoints > $playerTwoPoints? $this->playerOne : $this->playerTwo;
    }

    public function getWinner(): Player
    {
        return $this->winner;
    }
}