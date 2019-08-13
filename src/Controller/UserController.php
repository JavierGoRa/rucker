<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Player;
use App\Form\RegisterType;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $user = new Player();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid) {
            $user->setRole('ROLE_USER');
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect('/signin');

        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function signin(Request $request)
    {

        $user = new Player();
        $form = $this->createFormBuilder($user)
            ->setMethod('POST')
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        return $this->render('user/signin.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
