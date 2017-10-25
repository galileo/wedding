<?php

namespace AppBundle\Library\Model;

use AppBundle\Entity\Guest;

class UserPriceRangeCount
{
    const ADULT = 1;
    const KID = 2;
    const BABY = 3;

    private $adults;
    private $kids;
    private $babies;

    /**
     * @param Guest[] $guests
     *
     * @return UserPriceRangeCount
     */
    public static function fromArray(array $guests)
    {
        $stats = [
            self::ADULT => [],
            self::KID => [],
            self::BABY => [],
        ];

        foreach ($guests as $guest) {
            $stats[$guest->getPriceRange()][] = $guest;
        }

        return new UserPriceRangeCount($stats[self::ADULT], $stats[self::KID], $stats[self::BABY]);
    }

    public function __construct($adults, $kids, $babies)
    {
        $this->adults = $adults;
        $this->kids = $kids;
        $this->babies = $babies;
    }

    public function countAdults()
    {
        return count($this->adults);
    }

    public function countKids()
    {
        return count($this->kids);
    }

    public function countBabies()
    {
        return count($this->babies);
    }
}
