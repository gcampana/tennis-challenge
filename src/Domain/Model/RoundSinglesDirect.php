<?php

namespace App\Domain\Model;


class RoundSinglesDirect implements Round
{
    private array $players;

    private array $matches;

    private array $winners;

    private MatchFactory $matchFactory;

    public function __construct(MatchFactory $matchFactory)
    {
        $this->matchFactory = $matchFactory;
        $this->players = [];
        $this->matches = [];
        $this->winners = [];
    }

    public function addPlayer(Player $player): void
    {
        $this->players[] = $player;
    }

    /**
     * @param Player[] $players
     */
    public function setPlayers(array $players): void
    {
        $this->players = $players;
    }

    public function generateMatches(): void
    {
        $matchesToCreate = count($this->players) / 2;
        for($i = 0; $i < $matchesToCreate; $i++) {
            $match = $this->matchFactory->createMatchGame();
            $match->setPlayerOne($this->players[$i*2]);
            $match->setPlayerTwo($this->players[$i*2+1]);
            $this->matches[] = $match;
        }
    }

    public function getMatches(): array
    {
        return $this->matches;
    }

    public function playMatches(): void
    {
        /** @var MatchGame $match */
        foreach ($this->matches as $match) {
            $match->play();
            $this->winners[] = $match->getWinner();
        }
    }

    public function getWinners(): array
    {
        return $this->winners;
    }

}