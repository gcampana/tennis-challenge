<?php

namespace App\Domain\Model;

use App\Domain\Exception\CantAddPlayerException;

class TournamentMale extends Tournament
{
    public function addPlayer(Player $player): void
    {
        if(!$player instanceof PlayerMale){
            throw new CantAddPlayerException('Only male players can play');
        }
        $this->players[] = $player;
    }

}