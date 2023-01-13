<?php

namespace App\Domain\Model;

class PlayerFemale extends Player
{
    private $reactionTime;

    public function __construct($name, $skill, int $reactionTime)
    {
        parent::__construct($name, $skill);
        $this->reactionTime = $reactionTime;
    }

    public function getReactionTime(): int
    {
        return $this->reactionTime;
    }

    public function setReactionTime(int $reactionTime): void
    {
        $this->reactionTime = $reactionTime;
    }
}