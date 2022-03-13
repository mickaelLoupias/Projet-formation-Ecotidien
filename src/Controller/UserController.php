<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    //POUR  NE PAS ACCEDER A LISTE DES UTILISATEURS => COMMENTER
    // /**
    //  * @Route("/", name="user_index", methods={"GET"})
    //  */
    // public function index(UserRepository $userRepository): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //        'users' => $userRepository->findAll(),
    //     ]);
    // }

    /**
     * @Route("/new", name="user_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

           //hashage
           $user-> setPassword(
               $passwordEncoder->hashPassword($user, $user->getPassword())
           );
           $user -> setLevel("AMATEUR");
           $user->setSubscribedate(new \DateTime());
            
            $entityManager->persist($user);
            $entityManager->flush();
            
              //permet d'envoyer a la BDD les donnée du formualire et de rediriger vers la page voulu
           // return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
           return $this->redirectToRoute('home_quiz', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    // /**
    //  * @Route("/{id}/edit", name="user_edit", methods={"GET", "POST"})
    //  */
    // public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(UserType::class, $user);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('user/edit.html.twig', [
    //         'user' => $user,
    //         'form' => $form,
    //     ]);
    // }

    /**
     * @Route("/{id}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
    }
}