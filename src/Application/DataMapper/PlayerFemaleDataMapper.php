<?php

namespace App\Application\DataMapper;

use App\Domain\Model\PlayerFemale;

class PlayerFemaleDataMapper
{
    public function map(array $participants): array
    {
        $players = [];
        foreach($participants as $participant){
            if (count(array_intersect_key(array_flip(['name', 'skill', 'reactionTime']), $participant)) !== 3) {
                throw new \InvalidArgumentException('The player\'s fields has errors');
            }
            $players[] = new PlayerFemale($participant['name'], $participant['skill'], $participant['reactionTime']);
        }
        return $players;
    }
}