<?php

namespace App\Repository;

use App\Entity\GroceryListItem;
use App\Trait\RepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GroceryListItem>
 *
 * @method GroceryListItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroceryListItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroceryListItem[]    findAll()
 * @method GroceryListItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroceryListItemRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroceryListItem::class);
    }
}
