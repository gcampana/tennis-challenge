<?php

namespace App\Application\DataMapper;


class PlayerDataMapper
{
    private $map = [
        'male' => PlayerMaleDataMapper::class,
        'female' => PlayerFemaleDataMapper::class,
    ];

    /**
     * @param string $type
     * @param array $participants
     * @return \App\Domain\Model\Player[]
     */
    public function map(string $type, array $participants): array
    {
        $mapper = new $this->map[$type];
        return $mapper->map($participants);
    }    
}