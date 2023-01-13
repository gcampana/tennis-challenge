<?php
use App\Domain\Exception\NotEnoughPlayersException;
use App\Domain\Model\EliminationModeDirect;
use App\Domain\Model\MatchWomanFactory;

class DirectEliminationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function tournament_does_not_have_enough_players(): void
    {
        $this->expectException(NotEnoughPlayersException::class);
        $this->expectExceptionMessage('The tournament does not have enough players');
        $matchWomanFactory = $this->createMock(MatchWomanFactory::class);
        $directElimination = new EliminationModeDirect($matchWomanFactory);
        $directElimination->setRemainingPlayers(['1']);
        $directElimination->startCompetition();
    }

}