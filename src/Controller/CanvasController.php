<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CanvasController extends AbstractController
{
    /**
     * @Route("/canvas", name="canvas")
     */
    public function index()
    {
        return $this->render('canvas/index.html.twig', [
            'controller_name' => 'CanvasController',
        ]);
    }
}
