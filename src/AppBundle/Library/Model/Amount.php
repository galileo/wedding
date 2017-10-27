<?php

namespace AppBundle\Library\Model;

class Amount
{
    /**
     * @var float
     */
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public static function fromValue($value)
    {
        return new Amount($value);
    }

    public function amount()
    {
        return $this->amount;
    }
}
