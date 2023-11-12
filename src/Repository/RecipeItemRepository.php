<?php

namespace App\Repository;

use App\Entity\RecipeItem;
use App\Trait\RepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecipeItem>
 *
 * @method RecipeItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeItem[]    findAll()
 * @method RecipeItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeItemRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeItem::class);
    }
}
