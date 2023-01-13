<?php

namespace App\Domain\Model;

use App\Domain\Exception\NotEnoughPlayersException;

class EliminationModeDirect implements EliminationMode
{
    protected array $remainingPlayers;
    protected array $playedRounds;
    protected $matchFactory;

    public function __construct(MatchFactory $matchFactory)
    {
        $this->playedRounds = [];
        $this->remainingPlayers = [];
        $this->matchFactory = $matchFactory;
    }

    public function setRemainingPlayers(array $players): void
    {
        $this->remainingPlayers = $players;
    }

    /**
     * @throws NotEnoughPlayersException
     */
    public function startCompetition(): void
    {
        $this->hasEnoughPlayers();
        $this->playRounds();
    }

    /**
     * @throws NotEnoughPlayersException
     */
    private function hasEnoughPlayers(): void
    {
        if(count($this->remainingPlayers)%2 !== 0){
            throw new NotEnoughPlayersException('The tournament does not have enough players');
        }
    }

    private function playRounds(): void
    {
        while(count($this->remainingPlayers) > 1){
            $round = $this->generateRound();
            $round->playMatches();
            $this->playedRounds[] = $round;
            $this->remainingPlayers = $round->getWinners();
        }
    }

    private function generateRound(): Round
    {
        $round = RoundFactory::create($this->matchFactory);
        $round->setPlayers($this->remainingPlayers);
        $round->generateMatches();
        return $round;
    }

    public function getPlayedRounds(): array
    {
        return $this->playedRounds;
    }

    public function getWinner(): Player
    {
        return reset($this->remainingPlayers);
    }

}