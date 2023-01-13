<?php

namespace App\Domain\Model;

use App\Domain\Exception\TournamentTypeNotFoundException;

abstract class TournamentFactory
{
    public abstract function createTournament(): Tournament;

    public abstract function createEliminationMode(): EliminationMode;

}