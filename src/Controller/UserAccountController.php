<?php

namespace App\Controller;

use App\Entity\Challenges;
use App\Entity\ChallengeUser;
use App\Repository\AstucesRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use App\Repository\ChallengesRepository;
use App\Repository\ChallengeUserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class UserAccountController extends AbstractController
{
    /**
     * @Route("/user/account", name="user_account")
     */
    public function index(?UserInterface $user,ChallengesRepository $challengesRepository,AstucesRepository $AstucesRepository,ChallengeUserRepository $challengeUserRepository): Response{
       

        // Accéder au données astuces
        $AstucesResults = $AstucesRepository->findALl();
        //Mélanger le tableau
        shuffle($AstucesResults);

        //UserInterface permet d'acces au donnée User
        //$results recupere les données de la requête par la methode findBy avec en parametre les infos dynamique
        $results = $challengesRepository -> findByChallengeNotDone($user->getid(), $user->getlevel());
       
        //affichage du total des résultats des challenges
        $sumPoints = $challengeUserRepository -> findSumPoints($user->getId());
        // current permet de descendre au premier résulatt d'un tableau
        $sumPoints = current($sumPoints);

        //Affichage du gain energie du challenge réalisé
        $sumEnergy = $challengeUserRepository->findSumEnergy($user->getId());
        $sumEnergy = current($sumEnergy);

        
        
        return $this->render('user_account/index.html.twig', [
            'user' => $user,
            'results' => $results,
            'resultsAstuces' => $AstucesResults,
            'sumPoints' => $sumPoints,
            'sumEnergy' => $sumEnergy,
            
        ]);
    }

     /**
     * @Route("/user/challenge/{id}", name="valid_challenge")
     */
    public function validChallenge($id,ChallengeUserRepository $challengeUserRepository,EntityManagerInterface $entityManagerInterface){   
        //cette route récupère l'id du challenge_user qui aura été passé en paramètre
        
        //ave cun find récupérer l'enregistrement en bdd
        $res = $challengeUserRepository->find($id);
        dump($res);
        //avec un setter , vous modifier sa prop processus pour passer de 0 à 1
        $res -> setProcessus(1);
        //flush
        $entityManagerInterface -> flush();
        //Récupérer le gain
        
        //rediriger vers account
        return $this -> redirectToRoute("user_account");
    }


    /**
     * @Route("/user/start/{id}", name="start_challenge")
     */
    public function startChallenge($id,UserInterface $user,EntityManagerInterface $entityManagerInterface,ChallengesRepository $challengesRepository){
        $challenge =$challengesRepository->find($id);
        //créer une nouvelle entité challenge User
        $challengeUser = new ChallengeUser();

        //utiliser les setters pour définir chacune des valeurs dont elle a besoin
        $challengeUser->setIdUser($user);
        $challengeUser->setIdChallenge($challenge);
        $challengeUser->setProcessus(0);

        //persist + flush
        $entityManagerInterface->persist($challengeUser);
        $entityManagerInterface->flush();

        //redirection vers la page account
        return $this -> redirectToRoute("user_account");
    }


    /**
     * @Route("/user/search/{query}", methods={"GET"})
     */
    public function searchBar($query,ChallengesRepository $challengesRepository): Response {    
        
        $challenge = $challengesRepository -> findByChallenge($query);

        return new JsonResponse($challenge);

    }
}
