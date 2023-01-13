<?php

namespace App\Domain\Repository;

use App\Domain\Model\Tournament;

interface TournamentRepository
{
    public function save(Tournament $tournament): void;

    public function searchByFilter(array $filterValues): iterable;
}
