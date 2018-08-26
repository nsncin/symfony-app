<?php

namespace App\Controller;

use App\Entity\Users;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MyAccountController extends AbstractController
{
    /**
     * @Route("/my/account", name="my_account")
     */
    public function index()
    {
        $users=$this->getUser();

        var_dump($users->getUsername());




        return $this->render('my_account/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
}
