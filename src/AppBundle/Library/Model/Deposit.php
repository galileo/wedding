<?php

namespace AppBundle\Library\Model;

class Deposit
{
    private $amount;
    private $message;

    public function __construct($amount, $message = '')
    {
        $this->amount = $amount;
        $this->message = $message;
    }

    public static function registerForExpense(Expense $expense, $amount, $message = '')
    {
        $deposit = new Deposit($amount, $message);

        $expense->deposit($deposit);;

        return $deposit;
    }

    public function amount()
    {
        return $this->amount;
    }

    public function message()
    {
        return $this->message;
    }
}
