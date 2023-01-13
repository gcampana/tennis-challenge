<?php

use App\Domain\Model\MatchSingles;
use App\Domain\Model\PlayerMale;
use App\Domain\Model\PointCalculatorForMen;

class MatchTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function get_winner_after_match_play(): void
    {
        $playerOne = $this->createMock(PlayerMale::class);
        $playerTwo = $this->createMock(PlayerMale::class);
        $calculator = $this->createMock(PointCalculatorForMen::class);
        $match = new MatchSingles($calculator);
        $match->setPlayerOne($playerOne);
        $match->setPlayerTwo($playerTwo);
        $match->play();
        $this->assertIsString($match->getWinner()->getName());
    }

}