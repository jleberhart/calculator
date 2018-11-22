<?php

namespace App\Controller;

use App\Form\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MathsController extends AbstractController
{
    /**
     * @Route("/", name="maths")
     */
    public function calculatorForm(Request $request)
    {
        $form = $this->createForm(CalculatorType::class);

        $form->handleRequest($request);

        dump($request);

        return $this->render('maths/maths.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
}
