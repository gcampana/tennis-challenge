<?php

namespace App\Adapter\Persistence\Repository\Filter;
use Doctrine\ORM\QueryBuilder;

abstract class Filter
{
    public function __construct(
        protected QueryBuilder $queryBuilder)
    {
    }

    public function apply(array $filterValues): QueryBuilder
    {
        foreach (array_filter($filterValues) as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->queryBuilder;
    }

    public function setBuilder(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }
}