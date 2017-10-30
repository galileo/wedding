<?php

namespace AppBundle\Controller;

use AppBundle\Library\Infrastructure\GalileoSettingBundle\CostSettingGalileoBuilder;
use AppBundle\Library\Infrastructure\Symfony\CostSettings;
use AppBundle\Library\Infrastructure\Symfony\CostSettingSymfonyBuilder;
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

        $defaults = new CostSettingSymfonyBuilder($this->container);
        $costSettingsFactory = new CostSettingGalileoBuilder($this->get('galileo.setting.setting'));

        $costSettings = $costSettingsFactory->buildWithDefaults($defaults->build());

        // replace this example code with whatever you need
        $costSummary = CostSummary::buildFrom($userCount, $costSettings);

        $costSummary->register('Fountain', 1, 250);
        $costSummary->register('Breakfast', 9, 20);

        return $this->render('wedding/hallCostSummary.html.twig', [
            'costs' => $costSummary,
        ]);
    }
}
