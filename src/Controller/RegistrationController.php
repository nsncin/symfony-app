<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use App\Form\UsersType;
use App\Entity\Users;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class RegistrationController extends AbstractController
{





    /**
     * @Route("/registration", name="registration")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder,AuthenticationUtils $utils)
    {
        $errors=$utils->getLastAuthenticationError();

        $request = Request::createFromGlobals();

        // 1) build the form
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('home');
        } else{

          //  $errors=$this->container->get('request_stack');

    }

        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }
}
