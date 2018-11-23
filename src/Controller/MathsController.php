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

        if ($form->isSubmitted() && $form->isValid()) {

            $mathsFormData = $form->getData();


            if (is_numeric($mathsFormData['firstNumber']) AND is_numeric($mathsFormData['secondNumber'])) {

                $productOfMaths =
                    "Your answer is " .
                    eval('return '.$mathsFormData['firstNumber'] . $mathsFormData['operator'] . $mathsFormData['secondNumber'].';');

                $this->addFlash('success', $productOfMaths);

                return $this->redirectToRoute('maths');

            } else {

                $this->addFlash('warning', 'Please enter numbers');

                return $this->redirectToRoute('maths');

            }

        }

        return $this->render('maths/maths.html.twig', [
            'our_form' => $form->createView()
        ]);
    }


}
