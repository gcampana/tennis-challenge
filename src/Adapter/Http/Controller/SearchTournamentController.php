<?php

namespace App\Adapter\Http\Controller;

use App\Adapter\Http\DTO\TournamentSearchDTO;
use App\Application\SearchTournament\SearchTournamentRequest;
use App\Application\SearchTournament\SearchTournamentUseCase;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api/v1')]
class SearchTournamentController extends AbstractController
{
    private $searchTournamentUseCase;

    public function __construct(SearchTournamentUseCase $searchTournamentUseCase)
    {
        $this->searchTournamentUseCase = $searchTournamentUseCase;
    }


    #[Route('/tournament/search', name: 'tournament_search', methods: ['POST'])]
    public function index(TournamentSearchDTO $dto)
    {
        $searchTournamentRequest = new SearchTournamentRequest(
            $dto->getTournamentType(), $dto->getDate(), $dto->getPlayerName()
        );
        $tournamentRespose = $this->searchTournamentUseCase->excecute($searchTournamentRequest);
        return new JsonResponse($tournamentRespose);
    }
}