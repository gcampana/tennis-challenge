<?php

namespace App\Adapter\Persistence\Repository\Filter;

use App\Adapter\Persistence\Entity\Player;
use Doctrine\ORM\QueryBuilder;
class TournamentFilter extends Filter
{
    public function __construct(QueryBuilder $queryBuilder )
    {
        parent::__construct($queryBuilder);
    }

    public function tournamentType(string $value = null)
    {
        $this->queryBuilder->andWhere('t.tournamentType = :tournamentType')
            ->setParameter('tournamentType', $value);
    }

    public function date(string $value = null)
    {
        $this->queryBuilder->andWhere('t.createdAt BETWEEN :dateMin AND :dateMax')
            ->setParameters([
                'dateMin' => (new \Datetime($value))?->format('Y-m-d 00:00:00'),
                'dateMax' => (new \Datetime($value))?->format('Y-m-d 23:59:59')
            ]);
    }

    public function playerName(string $value = null)
    {
        $this->queryBuilder->leftJoin('t.winner','w')
            ->andWhere('w.name = :playerName')
            ->setParameter('playerName', $value);
    }
}