<?php

namespace App\Adapter\Http\DTO;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class TournamentSimulateDTO implements RequestDTO
{
    #[Assert\Choice(
        choices:['female', 'male']
    )]
    private ?string $tournamentType;

    #[Assert\NotNull]
    #[Assert\Type('array')]
    private ?array $participants;

    public function __construct(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $this->tournamentType =  $data['tournamentType']?? null;
        $this->participants = $data['participants']?? null;
    }

    public function getTournamentType(): ?string
    {
        return $this->tournamentType;
    }

    public function getParticipants():? array
    {
        return $this->participants;
    }

}