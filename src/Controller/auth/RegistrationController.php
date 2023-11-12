<?php

namespace App\Controller\auth;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher
    ) {}

    #[Route(path: '/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $em): RedirectResponse|Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->hasher->hashPassword($user, $user->getPassword()));

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('pages/auth/register.html.twig', [
            'form' => $form,
        ]);
    }

    // Uncomment this route to create the default admin
    /*
    #[Route(path: '/create-default-admin', name: 'create_default_admin')]
    public function createDefaultAdmin(UserPasswordHasherInterface $hasher, EntityManagerInterface $em): Response
    {
        $admin = new User();
        $admin->setEmail('admin@gmail.com'); // THE_EMAIL_YOU_PREFER
        $admin->setPassword(
            $hasher->hashPassword($admin, 'admin') // THE_PASSWORD_YOU_PREFER
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $em->persist($admin);
        $em->flush();

        return new Response();
    }
    */

}