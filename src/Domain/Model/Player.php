<?php

namespace App\Domain\Model;

class Player
{
    protected $name;
    protected $skill;

    public function __construct(string $name, int $skill)
    {
        if($skill < 0 || $skill > 100){
            throw new \InvalidArgumentException('Player skill must be from 0 up to 100');
        }
        $this->name = $name;
        $this->skill = $skill;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSkill(): int
    {
        return $this->skill;
    }

}