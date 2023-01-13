<?php

namespace App\Domain\Model;
use App\Domain\Exception\CantAddPlayerException;

class TournamentFemale extends Tournament
{
    public function addPlayer(Player $player): void
    {
        if(!$player instanceof PlayerFemale){
            throw new CantAddPlayerException('Only female players can play');
        }
        $this->players[] = $player;
    }
}