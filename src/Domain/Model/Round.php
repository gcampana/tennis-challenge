<?php

namespace App\Domain\Model;


interface Round
{
    public function generateMatches(): void;

    public function getMatches(): array;

    public function playMatches(): void;

    public function getWinners(): array;
}