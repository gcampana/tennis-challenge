<?php

namespace App\Adapter\Persistence\Repository;

use App\Adapter\Persistence\Entity\Tournament as TournamentEntity;
use App\Adapter\Persistence\Repository\Filter\TournamentFilter;
use App\Domain\Model\Tournament;
use App\Domain\Repository\TournamentRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineTournamentRepository extends ServiceEntityRepository implements TournamentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TournamentEntity::class);
    }

    public function save(Tournament $tournament): void
    {
        $entity = TournamentEntity::createFromModel($tournament);
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function searchByFilter(array $filterValues): iterable
    {
        $filter = new TournamentFilter($this->createQueryBuilder('t'));
        $qb = $filter->apply($filterValues);
        return $qb->getQuery()->getResult();
    }
}