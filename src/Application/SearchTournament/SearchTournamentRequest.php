<?php

namespace App\Application\SearchTournament;
use DateTime;

class SearchTournamentRequest
{
    public readonly ?string $date;
    public readonly ?string $tournamentType;
    public readonly ?string $playerName;

    public function __construct(string|null $tournamentType, string|null $date, string|null $playerName)
    {
        $this->date = $date;
        $this->tournamentType = $tournamentType;
        $this->playerName = $playerName;
    }

    public function toArray(): array
    {
        return [
            'date' => $this->date,
            'tournamentType' => $this->tournamentType,
            'playerName' => $this->playerName
        ];
    }
}