<?php

namespace AppBundle\Library\Infrastructure\Symfony;

use AppBundle\Library\Model\CostSetting;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CostSettingSymfonyBuilder
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function build()
    {
        return new CostSetting(
            $this->container->getParameter(CostSetting::PRICE_PERSON_ADULT_BASIC),
            $this->container->getParameter(CostSetting::PRICE_PERSON_ADULT_BEVERAGES),
            $this->container->getParameter(CostSetting::PRICE_PAIR_LEAVING_GIFT),
            $this->container->getParameter(CostSetting::PRICE_PERSON_KID_BASIC),
            $this->container->getParameter(CostSetting::PRICE_PERSON_KID_BEVERAGES),
            $this->container->getParameter(CostSetting::PRICE_PERSON_BABIES_BASIC),
            $this->container->getParameter(CostSetting::PRICE_PERSON_SUPPORT_BASIC)
        );

    }
}