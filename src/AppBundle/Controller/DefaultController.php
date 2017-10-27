<?php

namespace AppBundle\Controller;

use AppBundle\Library\Model\Budget;
use AppBundle\Library\Model\CostCalculator;
use AppBundle\Library\Model\UserPriceRangeCount;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/admin/budget", name="wedding_budget")
     */
    public function indexAction(Request $request)
    {
        $guests = $this->getDoctrine()->getRepository('AppBundle:Guest')->findAll();
        $userCount = UserPriceRangeCount::fromArray($guests);

        $budget = new Budget(
            $this->getDoctrine()->getRepository('AppBundle:Expense')->findBy([], ['amount' => 'DESC'])
        );

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'guests' => $guests,
            'userCount' => $userCount,
            'costs' => CostCalculator::from($userCount),
            'budget' => $budget
        ]);
    }
}
