<?php

namespace App\Application\SimulateTournament;

use App\Application\DTO;
use Doctrine\DBAL\Exception;

class SimulateTournamentRequest
{
    public function __construct(
        private string $tournamentType,
        private array $participants
    )
    {
    }

    public function getTournamentType(): string
    {
        return $this->tournamentType;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }
    

}