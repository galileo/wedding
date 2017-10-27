<?php

namespace AppBundle\Library\Model;

use AppBundle\Entity\Guest;

class UserPriceRangeCount
{
    const ADULT = 1;
    const YOUTH = 2;
    const KID = 3;
    const SUPPORT = 4;
    const FRIEND = 5;

    static $names = [
        self::ADULT => 'Adult',
        self::YOUTH => 'Youth',
        self::KID => 'Kid',
        self::SUPPORT => 'Support',
        self::FRIEND => 'Friend',
    ];

    private $adults;
    private $kids;
    private $babies;
    private $support;
    private $friends;

    /**
     * @param Guest[] $guests
     *
     * @return UserPriceRangeCount
     */
    public static function fromArray(array $guests)
    {
        $stats = [
            self::ADULT => [],
            self::YOUTH => [],
            self::KID => [],
            self::SUPPORT => [],
            self::FRIEND => [],
        ];

        foreach ($guests as $guest) {
            $stats[$guest->getPriceRange()][] = $guest;
        }

        return new UserPriceRangeCount(
            $stats[self::ADULT],
            $stats[self::YOUTH],
            $stats[self::KID],
            $stats[self::SUPPORT],
            $stats[self::FRIEND]
        );
    }

    public function __construct($adults, $kids, $babies, $support, $friends)
    {
        $this->adults = $adults;
        $this->kids = $kids;
        $this->babies = $babies;
        $this->support = $support;
        $this->friends = $friends;
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

    public function countSupport()
    {
        return count($this->support);
    }

    public function countFriends()
    {
        return count($this->friends);
    }
}
