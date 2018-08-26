<?php
/**
 * Created by PhpStorm.
 * User: N
 * Date: 8/14/18
 * Time: 7:23 PM
 */


// src/Controller/LuckyController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class LuckyController extends Controller
{
    public function number()
    {
        /**
         * @Route("/lucky/number",name="lucky")
         */

        $number = random_int(0, 100);
        return $this->render('lucky.html.twig', array(
            'number' => $number
        ));
    }
}