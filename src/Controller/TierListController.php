<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TierListController extends AbstractController {
    #[Route('/tier_list', name: 'tier_list')]
    public function index(): Response {
        return $this->render('tier_list/index.html.twig');
    }
}
