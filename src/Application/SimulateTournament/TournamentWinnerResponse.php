<?php

namespace App\Application\SimulateTournament;

class TournamentWinnerResponse
{
    private $winnerName;

    public function __construct(string $winnerName)
    {
        $this->winnerName = $winnerName;
    }

    public function getWinner(): string
    {
        return $this->winnerName;
    }

    public function toArray(): array
    {
        return [
            'winner' => $this->winnerName
        ];
    }

}