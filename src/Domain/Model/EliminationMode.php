<?php

namespace App\Domain\Model;

interface EliminationMode
{
    public function startCompetition(): void;

    public function getWinner(): Player;

    public function getPlayedRounds(): array;
}