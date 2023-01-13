<?php

namespace App\Application\DataMapper;

use App\Domain\Model\PlayerMale;

class PlayerMaleDataMapper
{
    public function map(array $participants): array
    {
        $players = [];
        foreach($participants as $participant){
            if (count(array_intersect_key(array_flip(['name', 'skill', 'strenght', 'velocity']), $participant)) !== 4) {
                throw new \InvalidArgumentException("The player's fields has errors");
            }
            $players[] = new PlayerMale($participant['name'], $participant['skill'], 
                $participant['strenght'], $participant['velocity']);
        }
        return $players;
    }
}