<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request,AuthenticationUtils $utils)
    {
        $error=$utils->getLastAuthenticationError();
        $lastUsername=$utils->getLastUsername();

        return $this->render('login/login.html.twig', [
            "error"         => $error,
            "lastUsername"  => $lastUsername
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */

    public function logout(){

    }
}
