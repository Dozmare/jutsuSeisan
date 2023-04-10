<?php

namespace App\Controller;

use App\Entity\Jutsu;
use App\Entity\Voie;

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
    public function index(JutsuRepository $jutsu, VoieRepository $voie): Response
    {
        $jutsuList = $jutsu->findAll();
        $voieList = $voie->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'homeController',
            'jutsuList' => $jutsuList,
            'voieList' => $voieList
        ]);
    }
}
