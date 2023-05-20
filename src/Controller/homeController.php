<?php

namespace App\Controller;

use App\Entity\Jutsu;
use App\Entity\Voie;
use App\Form\SearchType;
use App\Model\SearchData;

use App\Repository\VoieRepository;
use App\Repository\JutsuRepository;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class homeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(JutsuRepository $jutsu, VoieRepository $voie, Request $request): Response
    {
        $jutsuList = $jutsu->findAll();
        $voieList = $voie->findAll();
        $searchData = new SearchData();
        $form = $this->createForm(SearchType::class, $searchData);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $jutsuList = $jutsu->findByName($searchData->q);
            return $this->render('home/index.html.twig', [
                'controller_name' => 'homeController',
                'form'=> $form->createView(),
                'jutsuList' => $jutsuList,
                'voieList' => $voieList
            ]);
            
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'homeController',
            'form'=> $form->createView(),
            'jutsuList' => $jutsuList,
            'voieList' => $voieList
        ]);
    }


    /**
     * @Route("/jutsu/{jutsuName}", name="jutsu")
     */
    public function jutsuname(string $jutsuName,JutsuRepository $jutsu, VoieRepository $voie,  EntityManagerInterface $entityManager): Response
    {
        $jutsuList = $jutsu->findAll();
        $jutsu= $jutsu ->findOneBy(['name'=>$jutsuName]);

        return $this->render('home/jutsu.html.twig', [
            'jutsu' => $jutsu,
            'jutsuList' => $jutsuList
        ]);
    }


    /**
     * @Route("/voie/{IdVoie}", name="voie_id")
     */
    public function getJutsuByVoies(int $IdVoie, jutsuRepository $jutsu, voieRepository $voie): Response
    {
        $jutsuList = $jutsu->findBy(['idVoie' => $IdVoie]);
        $voieList = $voie->findAll();

        if($jutsuList ==[])
        {
            return $this->render('error/errorJutsuList.html.twig', [
                'jutsuList' => $jutsuList,
                'voieList' => $voieList
        ]);
    }

        else{        
            return $this->render('home/index.html.twig', [
            'jutsuList' => $jutsuList,
            'voieList' => $voieList
        ]);

        };

    }

    

}
