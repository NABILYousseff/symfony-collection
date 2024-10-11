<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\RecordCrate ;
use App\Entity\Vinyl ;
use App\Repository\RecordCrateRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Controlleur RecordCrate
 */
#[Route('/crates')]
class RecordCrateController extends AbstractController
{
    /**
     * Liste des inventaires
     */
    
    #[Route('/', name: 'home', methods: ['GET'])]
    public function indexAction(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $crates = $entityManager->getRepository(RecordCrate::class)->findAll();
        return $this->render('record_crate/index.html.twig', [
            'crates' => $crates,
        ]);
    }
    /**
     * Afficher un inventaire spécifique
     */
    #[Route('/{id}', name : 'recrate_show',requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showAction(RecordCrate $crate) : Response 
    {
        return $this->render('record_crate/show.html.twig',
            
            ['crate' => $crate]);
            
      }
}
