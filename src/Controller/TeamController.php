<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Team;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TeamController extends AbstractController
{

    public function create(Request $request){
        $team = new Team();
        $form = $this->createFormBuilder($team)
            //->setAction($this->generateUrl('addteam'))
            ->setMethod('POST')
            ->add('name', TextType::class)
            ->add('logo', FileType::class)
            ->add('category', ChoiceType::class, [
                'choices' => [
                    '3x3' => '5x5',
                    '5x5' => '5x5',
                ]
            ])
            ->add('nationality', CountryType::class)
            ->add('city', TextType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $team->setLogo(base64_encode(file_get_contents($team->getLogo())));
            $em->persist($team);
            $em->flush();
        }

        return $this->render('team/formTeam.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function index()
    {
        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
            'teamName' => 'Search your team by Id'
        ]);
    }

    public function save(Request $request){

        $entityManager = $this->getDoctrine()->getManager();

        $team = new Team();
        $team->setName('Milwaukee');
        $team->setLogo('test');
        $team->setCategory('Senior');
        $team->setNationality('Spain');
        $team->setCity('Puerto Serrano');
    
        $entityManager->persist($team);

        $entityManager->flush();
        
        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
        ]);

    }

    public function search($name){
        $team_repo = $this->getDoctrine()->getRepository(Team::class);

        $team = $team_repo->createQueryBuilder('t')
                ->andWhere("t.name like '%$name%'")
                ->getQuery();

        $resutl = $team->execute();

        var_dump($resutl);

        //return new Response ($team->getName());

        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
            'team' => $team
        ]);
    }
  
    public function update($id){

        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();
        $team_repo = $em->getRepository(Team::class);

        $team = $team_repo->find($id);

        $team->setName('Raptors');
        $team->setCategory('Junior');
        $team->setNationality('England');

        $em->persist($team);
        $em->flush();
        
        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
            'team' => $team
        ]);
    }

    public function delete(Team $team){
        $em = $this->getDoctrine()->getManager();
        $em->remove($team);
        $em->flush();
        
        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
            'team' => $team
        ]);
    }
}
