<?php

namespace App\Domain\Model;

use App\Domain\Exception\TournamentTypeNotFoundException;

class TournamentFemaleFactory extends TournamentFactory
{
    public function createTournament(): Tournament
    {
        return new TournamentFemale($this->createEliminationMode());
    }

    public function createEliminationMode(): EliminationMode
    {
        return new EliminationModeDirect(new MatchWomanFactory);
    }
}