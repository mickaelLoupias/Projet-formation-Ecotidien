<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

      /**
     * @Route("/about", name="about")
     */
    public function about(): Response{ 
        return $this ->render('home/about.html.twig');
    }



     /**
     * @Route("/quiz", name="home_quiz")
     */
    public function quiz(): Response{ 
        return $this ->render('home/quiz.html.twig');
    }

  /**
     * @Route("/quiz_start", name="home_quiz_start")
     */
    public function quiz_start(): Response{ 
        return $this ->render('home/quiz_start.html.twig');
    }

}