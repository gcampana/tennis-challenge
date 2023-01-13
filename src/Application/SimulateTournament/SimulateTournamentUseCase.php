<?php

namespace App\Application\SimulateTournament;

use App\Application\DataMapper\PlayerDataMapper;
use App\Domain\Model\TournamentCreator;
use App\Domain\Repository\TournamentRepository;

class SimulateTournamentUseCase
{
    private $tournamentRepository;

    public function __construct(TournamentRepository $tournamentRepository)
    {
        $this->tournamentRepository = $tournamentRepository;
    }
    
    public function excecute(SimulateTournamentRequest $request): TournamentWinnerResponse
    {
        $players = (new PlayerDataMapper)->map($request->getTournamentType(), $request->getParticipants());
        $tournament = TournamentCreator::getTournament($request->getTournamentType());
        $tournament->addAllPlayers($players);
        $tournament->simulate();
        $this->tournamentRepository->save($tournament);
        $winnerPlayer = $tournament->getWinner();
        $tournamentWinner = new TournamentWinnerResponse($winnerPlayer->getName());
        return $tournamentWinner;
    }

}