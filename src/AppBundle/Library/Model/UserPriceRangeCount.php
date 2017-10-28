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
    const PAIR = 'pair';

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
    private $pairs;

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
            self::PAIR => [],
        ];

        /** @var Guest $guest */
        foreach ($guests as $guest) {
            $stats[$guest->getPriceRange()][] = $guest;
            if ($guest->getPaar()) {
                $stats[self::PAIR][] = $guest;
            }
        }

        return new UserPriceRangeCount(
            $stats[self::ADULT],
            $stats[self::YOUTH],
            $stats[self::KID],
            $stats[self::SUPPORT],
            $stats[self::FRIEND],
            $stats[self::PAIR]
        );
    }

    public function __construct($adults, $kids, $babies, $support, $friends, $pairs)
    {
        $this->adults = $adults;
        $this->kids = $kids;
        $this->babies = $babies;
        $this->support = $support;
        $this->friends = $friends;
        $this->pairs = $pairs;
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

    public function countPairs()
    {
        return count($this->pairs);
    }

    public function countGuests()
    {
        return $this->countAdults() + $this->countKids() + $this->countBabies();
    }
}
