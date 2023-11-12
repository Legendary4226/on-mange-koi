<?php

namespace App\Trait;

use Doctrine\ORM\EntityManagerInterface;

trait ServiceTrait {
    private EntityManagerInterface $em;

    public function saveNotOwningSide($notOwningEntity, string $addFuncName, string $removeFuncName, array $owningEntities, array $oldPersistedEntities = [], $flush = true): void
    {
        foreach (array_diff($oldPersistedEntities, $owningEntities) as $entity) {
            $entity->{$removeFuncName}($notOwningEntity);
            $this->em->persist($entity);
        }
        foreach (array_diff($owningEntities, $oldPersistedEntities) as $entity) {
            $entity->{$addFuncName}($notOwningEntity);
            $this->em->persist($entity);
        }
        if ($flush) {
            $this->em->flush();
        }
    }

    /**
     * @param array $entities [entity]
     * @return array [entityUuid => entity]
     */
    public function mapEntitiesUuid(array $entities): array
    {
        $mapping = [];
        foreach ($entities as $entity) {
            $mapping[$entity->getUuid()] = $entity;
        }
        return $mapping;
    }
}