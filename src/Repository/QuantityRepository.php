<?php

namespace App\Repository;

use App\Entity\Quantity;
use App\Trait\RepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Quantity>
 *
 * @method Quantity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quantity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quantity[]    findAll()
 * @method Quantity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuantityRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quantity::class);
    }
}
