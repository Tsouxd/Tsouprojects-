<?php

namespace App\Controller;

use App\Entity\Absence;
use App\Entity\Presence;
use App\Entity\Niala;
use App\Entity\FoodPlanning;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/user')]
class AffichageUserController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Injectez le gestionnaire d'entités dans le constructeur
    }

    #[Route('/affichage/user', name: 'app_affichage_user')]
    public function index(): Response
    {
        $affichageUser = $this->entityManager->getRepository(Absence::class)->findAll();
        $affichageUserPresent = $this->entityManager->getRepository(Presence::class)->findAll();
        $affichageUserNiala = $this->entityManager->getRepository(Niala::class)->findAll();
        $affichageFoodPlanning = $this->entityManager->getRepository(FoodPlanning::class)->findAll();

        return $this->render('affichage_user/index.html.twig', [
            'controller_name' => 'AffichageUserController',
            'affichageUser' => $affichageUser,
            'affichageUserPresent' => $affichageUserPresent,
            'affichageUserNiala' => $affichageUserNiala,
            'affichageFoodPlanning' => $affichageFoodPlanning,
        ]);
    }
}
