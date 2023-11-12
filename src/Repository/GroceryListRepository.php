<?php

namespace App\Repository;

use App\Entity\GroceryList;
use App\Trait\RepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GroceryList>
 *
 * @method GroceryList|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroceryList|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroceryList[]    findAll()
 * @method GroceryList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroceryListRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroceryList::class);
    }
}
