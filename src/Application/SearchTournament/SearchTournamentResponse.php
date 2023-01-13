<?php

namespace App\Application\SearchTournament;
use Serializable;

class SearchTournamentResponse
{
    public function __construct(
        public readonly array $result
    )
    {
    }
    
}