<?php

namespace AppBundle\Library\Model;

class CostSummary
{
    private $costs = [];

    /**
     * @param UserPriceRangeCount $userPriceRangeCount
     * @param CostSetting $costSettings
     *
     * @return CostSummary
     */
    public static function buildFrom(UserPriceRangeCount $userPriceRangeCount, CostSetting $costSettings)
    {
        $costSummary = new CostSummary();

        $costSummary->register('Adults Base Price', $userPriceRangeCount->countAdults(), $costSettings->adultPrice());
        $costSummary->register('Kids Base Price', $userPriceRangeCount->countKids(), $costSettings->kidPrice());
        $costSummary->register('Babies Price', $userPriceRangeCount->countBabies(), $costSettings->babiesPrice());
        $costSummary->register('Support Price', $userPriceRangeCount->countSupport(), $costSettings->supportPrice());
        $costSummary->register('Leaving Gift Price', $userPriceRangeCount->countPairs(), $costSettings->pairLeavingGift());
        $costSummary->register('Adults Beverage Price', $userPriceRangeCount->countAdults(), $costSettings->adultBeverages());
        $costSummary->register('Kids Beverage Price', $userPriceRangeCount->countKids(), $costSettings->kidBeverages());

        return $costSummary;
    }

    public function register($string, $count, $price)
    {
        $this->costs[$string] = new Cost($count, $price);
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

    public function view()
    {
        return $this->costs;
    }
}
