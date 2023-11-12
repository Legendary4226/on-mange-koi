<?php

namespace App\Trait;

trait RepositoryTrait {
    public function saveEntity($obj): void
    {
        $this->_em->persist($obj);
        $this->_em->flush();
    }

    public function removeEntity($obj): void
    {
        $this->_em->remove($obj);
        $this->_em->flush();
    }
}