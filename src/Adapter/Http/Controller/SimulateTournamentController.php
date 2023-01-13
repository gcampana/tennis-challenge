<?php

namespace App\Adapter\Http\Controller;

use App\Adapter\Http\DTO\TournamentSimulateDTO;
use App\Application\SimulateTournament\SimulateTournamentRequest;
use App\Application\SimulateTournament\SimulateTournamentUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/v1')]
class SimulateTournamentController extends AbstractController
{
    private $simulateTournamentUseCase;

    public function __construct(SimulateTournamentUseCase $simulateTournamentUseCase)
    {
        $this->simulateTournamentUseCase = $simulateTournamentUseCase;
    }

    #[Route('/tournament/simulate', name: 'tournament_simulate', methods:["POST"])]
    public function index(TournamentSimulateDTO $dto)
    {
        $simulateTournamentRequest = new SimulateTournamentRequest($dto->getTournamentType(), $dto->getParticipants());
        $tournamentWinnerRespose = $this->simulateTournamentUseCase->excecute($simulateTournamentRequest);
        return new JsonResponse($tournamentWinnerRespose->toArray());
    }
}