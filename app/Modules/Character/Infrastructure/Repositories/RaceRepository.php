<?php

namespace App\Modules\Character\Infrastructure\Repositories;

use App\Modules\Character\Domain\Contracts\RaceRepositoryInterface;
use App\Modules\Character\Domain\Entities\Race;
use Doctrine\ORM\EntityManager;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RaceRepository implements RaceRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $id
     *
     * @return Race
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getOne(int $id): Race
    {
        /** @var Race $race */
        $race = $this->entityManager->find(Race::class, $id);

        if (is_null($race))
        {
            throw new ModelNotFoundException();
        }

        return $race;
    }
}
