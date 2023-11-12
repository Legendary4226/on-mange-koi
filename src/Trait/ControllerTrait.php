<?php

namespace App\Trait;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;

trait ControllerTrait
{
    /**
     * @return User|null
     */
    protected function getUser(): ?UserInterface
    {
        return parent::getUser();
    }
}