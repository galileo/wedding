<?php

namespace AppBundle\Library\Model;

class Cost
{
    private $total;
    private $count;
    private $price;

    /**
     * Cost constructor.
     * @param $count
     * @param $price
     */
    public function __construct($count, $price)
    {
        $this->count = $count;
        $this->price = $price;
        $this->calculateTotal();
    }

    public function count()
    {
        return $this->count;
    }

    public function price()
    {
        return $this->price;
    }

    public function total()
    {
        return $this->total;
    }

    private function calculateTotal()
    {
        $this->total = $this->count * $this->price;
    }
}
