<?php

namespace AppBundle\Library\Infrastructure\GalileoSettingBundle;

use AppBundle\Library\Model\CostSetting;
use Galileo\SettingBundle\Lib\Application\SettingApplication;

class CostSettingGalileoBuilder
{
    /**
     * @var SettingApplication
     */
    private $settingApplication;

    public function __construct(SettingApplication $settingApplication)
    {
        $this->settingApplication = $settingApplication;
    }

    public function buildWithDefaults(CostSetting $defaults)
    {
        $settingApplication = $this->settingApplication;

        return new CostSetting(
            $settingApplication->get(
                CostSetting::PRICE_PERSON_ADULT_BASIC,
                $defaults->adultPrice()
            ),
            $settingApplication->get(
                CostSetting::PRICE_PERSON_ADULT_BEVERAGES,
                $defaults->adultBeverages()
            ),
            $settingApplication->get(
                CostSetting::PRICE_PAIR_LEAVING_GIFT,
                $defaults->pairLeavingGift()
            ),
            $settingApplication->get(
                CostSetting::PRICE_PERSON_KID_BASIC,
                $defaults->kidPrice()),
            $settingApplication->get(
                CostSetting::PRICE_PERSON_KID_BEVERAGES,
                $defaults->kidBeverages()
            ),
            $settingApplication->get(
                CostSetting::PRICE_PERSON_BABIES_BASIC,
                $defaults->babiesPrice()
            ),
            $settingApplication->get(
                CostSetting::PRICE_PERSON_SUPPORT_BASIC,
                $defaults->supportPrice()
            )
        );
    }
}
