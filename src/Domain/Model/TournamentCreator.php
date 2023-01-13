<?php

namespace App\Domain\Model;


class TournamentCreator
{
    private static $map = [
        "male" => TournamentMaleFactory::class,
        "female" => TournamentFemaleFactory::class,
    ];

    public static function getTournament($type): Tournament
    {
        $tournamentFactory = new self::$map[$type];
        return $tournamentFactory->createTournament();
    }
}