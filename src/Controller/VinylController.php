<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Vinyl;
class VinylController extends AbstractController
{
    //Welcome page
    #[Route('/vinyl/{id}', name: 'vinyl_show',requirements: ['id' => '\d+'], methods : ['GET'])]
    public function showAction(Vinyl $vinyl) : Response
    {
        return $this->render('vinyl/index.html.twig',[
            'vinyl' => $vinyl,
            ]);
    }
    
}
