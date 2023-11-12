<?php

namespace App\Controller;

use App\Trait\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    use ControllerTrait;


    #[Route(path: '/', name: 'app_landing')]
    public function appLanding(): Response
    {
        return $this->render('pages/landing.html.twig');
    }
}