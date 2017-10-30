<?php

namespace AppBundle\Library\Model;

class CostSetting
{
    const PRICE_PERSON_ADULT_BASIC = 'price.person.adult.basic';
    const PRICE_PERSON_ADULT_BEVERAGES = 'price.person.adult.beverages';
    const PRICE_PAIR_LEAVING_GIFT = 'price.pair.leaving_gift';

    private $settings;

    const PRICE_PERSON_KID_BASIC = 'price.person.kid.basic';

    const PRICE_PERSON_KID_BEVERAGES = 'price.person.kid.beverages';

    const PRICE_PERSON_BABIES_BASIC = 'price.person.babies.basic';

    const PRICE_PERSON_SUPPORT_BASIC = 'price.person.support.basic';

    public function __construct(
        $adultPrice,
        $adultBeveragesPrice,
        $pairLeavingGift,
        $kidPrice,
        $kidBeveragesPrice,
        $babiesPrice,
        $supportPrice
    )
    {
        $this->settings[self::PRICE_PERSON_ADULT_BASIC] = $adultPrice;
        $this->settings[self::PRICE_PERSON_ADULT_BEVERAGES] = $adultBeveragesPrice;
        $this->settings[self::PRICE_PAIR_LEAVING_GIFT] = $pairLeavingGift;
        $this->settings[self::PRICE_PERSON_KID_BASIC] = $kidPrice;
        $this->settings[self::PRICE_PERSON_KID_BEVERAGES] = $kidBeveragesPrice;
        $this->settings[self::PRICE_PERSON_BABIES_BASIC] = $babiesPrice;
        $this->settings[self::PRICE_PERSON_SUPPORT_BASIC] = $supportPrice;
    }

    public function adultPrice()
    {
        return $this->settings[self::PRICE_PERSON_ADULT_BASIC];
    }

    public function adultBeverages()
    {
        return $this->settings[self::PRICE_PERSON_ADULT_BEVERAGES];
    }

    public function pairLeavingGift()
    {
        return $this->settings[self::PRICE_PAIR_LEAVING_GIFT];
    }

    public function kidPrice()
    {
        return $this->settings[self::PRICE_PERSON_KID_BASIC];
    }

    public function kidBeverages()
    {
        return $this->settings[self::PRICE_PERSON_KID_BEVERAGES];
    }

    public function babiesPrice()
    {
        return $this->settings[self::PRICE_PERSON_BABIES_BASIC];
    }

    public function supportPrice()
    {
        return $this->settings[self::PRICE_PERSON_SUPPORT_BASIC];
    }
}
