<?php

namespace App\Application\SearchTournament;
use App\Domain\Repository\TournamentRepository;

class SearchTournamentUseCase
{ 
    public function __construct(
        private TournamentRepository $tournamentRepository
    )
    {
    }


    public function excecute(SearchTournamentRequest $request): SearchTournamentResponse
    {
        $result = $this->tournamentRepository->searchByFilter($request->toArray());
        $response = new SearchTournamentResponse($result);
        return $response;        
    }
}