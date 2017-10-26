<?php

namespace AppBundle\Library\Model;


class CostCalculator
{
    private $adultsCosts;
    private $kidsCosts;

    public function __construct($adultsCosts, $kidsCosts)
    {
        $this->adultsCosts = $adultsCosts;
        $this->kidsCosts = $kidsCosts;
    }

    public static function from(UserPriceRangeCount $userPriceRangeCount, $basePrice = 218, $additionalPrice = 17)
    {
        return new CostCalculator(
            ($userPriceRangeCount->countAdults() * $basePrice) + ($userPriceRangeCount->countAdults() * $additionalPrice / 2),
            $userPriceRangeCount->countKids() * $basePrice / 2
        );
    }

    public function adults()
    {
        return $this->adultsCosts;
    }

    public function kids()
    {
        return $this->kidsCosts;
    }

    public function all()
    {
        return $this->kidsCosts + $this->adultsCosts;
    }
}
