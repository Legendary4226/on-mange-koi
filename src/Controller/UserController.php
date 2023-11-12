<?php

namespace App\Controller;

use App\Service\UserService;
use App\Trait\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/user', name: 'user_')]
class UserController extends AbstractController
{
    use ControllerTrait;

    public function __construct(
        private readonly UserService $userService
    ) {}

    #[Route(path: '/profile', name: 'profile')]
    public function appProfile(): Response
    {
        return $this->render('pages/user/profile.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
}