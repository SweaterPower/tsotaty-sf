<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BranchController extends AbstractController
{
    /**
     * @Route("/branch", name="branch")
     */
    public function index()
    {
        $a = 5;
        $b = 6;
        $c = [1, 2];
        $d = $a + $b + $c[0];
        echo var_dump($d);
        return $this->render('branch/index.html.twig', [
            'controller_name' => 'BranchController',
            'test_var' => $d,
        ]);
    }
}
