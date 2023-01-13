<?php

use App\Domain\Model\MatchManFactory;
use App\Domain\Model\PlayerMale;
use App\Domain\Model\RoundSinglesDirect;

class RoundTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function should_generate_matches(): void
    {
        $this->round = new RoundSinglesDirect(new MatchManFactory);
        for($i=0; $i < 8; $i++){
            $player = new PlayerMale('Player 1'.$i,40,50,40);
            $this->round->addPlayer($player);
        }
        $this->round->generateMatches();
        $this->assertCount(4, $this->round->getMatches());
    }

    /**
     * @test
     */
    public function get_winners_after_round_simulation(): void
    {
        $this->round = new RoundSinglesDirect(new MatchManFactory);
        for($i=0; $i < 8; $i++){
            $player = new PlayerMale('Player 1'.$i,40,50,40);
            $this->round->addPlayer($player);
        }
        $this->round->generateMatches();
        $this->round->playMatches();
        $this->assertNotEmpty($this->round->getWinners());
    }
}