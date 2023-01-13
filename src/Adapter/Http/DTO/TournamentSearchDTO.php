<?php

namespace App\Adapter\Http\DTO;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class TournamentSearchDTO implements RequestDTO
{
    #[Assert\Choice(
        choices:['female', 'male']
    )]
    private ?string $tournamentType;

    #[Assert\Date]
    private ?string $date;
    
    private ?string $playerName;

    public function __construct(Request $request)
    {
        //$request = $requestStack->getCurrentRequest();
        $data = json_decode($request->getContent(), true);
        $this->tournamentType = $data['tournamentType']?? null;
        $this->date = $data['date']?? null;
        $this->playerName = $data['playerName']?? null;
    }

    public function getTournamentType(): ?string
    {
        return $this->tournamentType;
    }

    public function setTournamentType($tournamentType): void
    {
        $this->tournamentType = $tournamentType;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate($date): ?string
    {
        $this->date = $date;
    }

    public function getPlayerName(): ?string
    {
        return $this->playerName;
    }

    public function setPlayerName($playerName): ?string
    {
        $this->playerName = $playerName;
    }
}