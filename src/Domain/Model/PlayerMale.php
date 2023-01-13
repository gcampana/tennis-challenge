<?php

namespace App\Domain\Model;

class PlayerMale extends Player
{
    private $strength;
    private $velocity;

    public function __construct(string $name, int $skill, int $strength, int $velocity)
    {
        parent::__construct($name, $skill);
        $this->strength = $strength;
        $this->velocity = $velocity;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function getVelocity(): int
    {
        return $this->velocity;
    }

    public function setVelocity(int $velocity): void
    {
        $this->velocity = $velocity;
    }
}