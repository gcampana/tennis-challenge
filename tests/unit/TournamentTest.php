<?php

use App\Domain\Exception\CantAddPlayerException;
use App\Domain\Exception\NotEnoughPlayersException;
use App\Domain\Model\EliminationModeDirect;
use App\Domain\Model\PlayerMale;
use App\Domain\Model\TournamentFemale;
use App\Domain\Model\PlayerFemale;
use App\Domain\Model\TournamentMale;

class TournamentTest extends PHPUnit\Framework\TestCase
{

    /**
     * @test
     */
    public function female_tournament_should_be_only_for_women(): void
    {
        $this->expectException(CantAddPlayerException::class);
        $player = new PlayerMale('Jhon Doe',60, 50, 40);
        $tournamentMode = $this->createMock(EliminationModeDirect::class);
        $tournament = new TournamentFemale($tournamentMode);
        $tournament->addPlayer($player);
    }

    /**
     * @test
     */
    public function male_tournament_should_be_only_for_men(): void
    {
        $this->expectException(CantAddPlayerException::class);
        $player = $this->getMockBuilder(PlayerFemale::class)
            ->disableOriginalConstructor()
            ->getMock();
        $tournamentMode = $this->createMock(EliminationModeDirect::class);
        $tournament = new TournamentMale($tournamentMode);
        $tournament->addPlayer($player);
    }

    /**
     * @test
     */
    public function tournament_has_no_players(): void
    {
        $this->expectException(NotEnoughPlayersException::class);
        $this->expectExceptionMessage('The tournament has no registered players');
        $tournamentMode = $this->createMock(EliminationModeDirect::class);
        $tournament = new TournamentFemale($tournamentMode);
        $tournament->simulate();
    }

    /**
     * @test
     */
    public function simulate_tournament(): void
    {
        $tournamentMode = $this->createMock(EliminationModeDirect::class);
        $tournament = new TournamentFemale($tournamentMode);
        for($i = 0; $i < 8; $i++){
            $player = $this->getMockBuilder(PlayerFemale::class)
                ->disableOriginalConstructor()
                ->getMock();
            $tournament->addPlayer($player);
        }
        $tournament->simulate();
        $this->assertIsString($tournament->getWinner()->getName());
    }

}