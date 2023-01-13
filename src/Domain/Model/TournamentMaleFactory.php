<?php

namespace App\Domain\Model;

class TournamentMaleFactory extends TournamentFactory
{
    public function createTournament(): Tournament
    {
        return new TournamentMale($this->createEliminationMode());
    }

    public function createEliminationMode(): EliminationMode
    {
        return new EliminationModeDirect(new MatchManFactory);
    }

}