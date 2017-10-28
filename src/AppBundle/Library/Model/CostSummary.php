<?php

namespace AppBundle\Library\Model;


class CostSummary
{
    private $costs = [];

    /**
     * @param UserPriceRangeCount $userPriceRangeCount
     * @param $adultBasePrice
     * @param $kidBasePrice
     * @param $babiesPrice
     * @param $supportPrice
     * @param $adultBeveragesPrice
     * @param $kidBeveragesPrice
     * @param $pairLeavingGiftPrice
     *
     * @return CostSummary
     */
    public static function buildFrom(
        UserPriceRangeCount $userPriceRangeCount,
        $adultBasePrice,
        $kidBasePrice,
        $babiesPrice,
        $supportPrice,
        $adultBeveragesPrice,
        $kidBeveragesPrice,
        $pairLeavingGiftPrice
    )
    {
        $costSummary = new CostSummary();

        $costSummary->register('Adults Base Price', $userPriceRangeCount->countAdults(), $adultBasePrice);
        $costSummary->register('Kids Base Price', $userPriceRangeCount->countKids(), $kidBasePrice);
        $costSummary->register('Babies Price', $userPriceRangeCount->countBabies(), $babiesPrice);
        $costSummary->register('Support Price', $userPriceRangeCount->countSupport(), $supportPrice);
        $costSummary->register('Leaving Gift Price', $userPriceRangeCount->countPairs(), $pairLeavingGiftPrice);
        $costSummary->register('Adults Beverage Price', $userPriceRangeCount->countAdults(), $adultBeveragesPrice);
        $costSummary->register('Kids Beverage Price', $userPriceRangeCount->countKids(), $kidBeveragesPrice);

        return $costSummary;
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
        return array_reduce(
            $this->costs,
            function ($sum, Cost $cost) {
                return $sum + $cost->total();
            },
            0);
    }

    public function register($string, $count, $price)
    {
        $this->costs[$string] = new Cost($count, $price);
    }

    public function view()
    {
        return $this->costs;
    }
}
