<?php

namespace App\Domain\Model;
use App\Domain\Exception\NotEnoughPlayersException;

abstract class Tournament
{
    protected array $players;
    protected EliminationMode $tournamentMode;

    protected \DateTime $createdAt;

    public function __construct(EliminationMode $tournamentMode)
    {
        $this->tournamentMode = $tournamentMode;
        $this->createdAt = new \DateTime();
        $this->players = [];
    }

    public function addAllPlayers(array $allPlayers): void
    {
        foreach ($allPlayers as $player) {
            $this->addPlayer($player);
        }
    }

    abstract public function addPlayer(Player $player): void;

    public function simulate(): void
    {
        $this->hasPlayers();
        $this->tournamentMode->setRemainingPlayers($this->players);
        $this->tournamentMode->startCompetition();
    }

    public function hasPlayers(): void
    {
        if (count($this->players) === 0) {
            throw new NotEnoughPlayersException("The tournament has no registered players");
        }
    }

    public function getWinner(): Player
    {
        return $this->tournamentMode->getWinner();
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

}