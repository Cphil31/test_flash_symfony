<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('message','page home');
        $foo = $session->get('message');
        $this->addFlash(
            'notice',
            $foo
        );

        unset($_SESSION['foo']);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Home',
        ]);
    }
}
