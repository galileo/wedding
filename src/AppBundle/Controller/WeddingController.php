<?php

namespace AppBundle\Controller;

use AppBundle\Library\Model\Budget;
use AppBundle\Library\Model\CostSummary;
use AppBundle\Library\Model\UserPriceRangeCount;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WeddingController extends Controller
{
    /**
     * @Route("/admin/wedding/budget", name="wedding.budget")
     */
    public function indexAction(Request $request)
    {
        $budget = new Budget(
            $this->getDoctrine()->getRepository('AppBundle:Expense')->findBy([], ['amount' => 'DESC'])
        );

        return $this->render('wedding/budgetSummary.html.twig', [
            'budget' => $budget
        ]);
    }

    /**
     * @Route("/admin/wedding/hall_summary", name="wedding.hall_summary")
     */
    public function weddingHallSummaryAction()
    {
        $guests = $this->getDoctrine()->getRepository('AppBundle:Guest')->findAll();

        $userCount = UserPriceRangeCount::fromArray($guests);

        // replace this example code with whatever you need
        $costSummary = CostSummary::buildFrom($userCount,
            $this->getParameter('price.person.adult.basic'),
            $this->getParameter('price.person.kid.basic'),
            $this->getParameter('price.person.babies.basic'),
            $this->getParameter('price.person.support.basic'),
            $this->getParameter('price.person.adult.beverages'),
            $this->getParameter('price.person.kid.beverages'),
            $this->getParameter('price.pair.leaving_gift')
        );

        $costSummary->register('Fountain', 1, 250);
        $costSummary->register('Breakfast', 9, 20);

        return $this->render('wedding/hallCostSummary.html.twig', [
            'costs' => $costSummary,
        ]);
    }
}
