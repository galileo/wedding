<?php

namespace AppBundle\Library\Model;

class Expense
{
    private $amount;
    private $name;
    private $depositList;

    public function __construct($name, $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->depositList = [];
    }

    public static function intoBudget(Budget $budget, $name, $amount)
    {
        $expense = new Expense($name, $amount);
        $budget->register($expense);

        return $expense;
    }

    public function deposit(Deposit $deposit)
    {
        $this->depositList[] = $deposit;
    }

    public function deposits()
    {
        return $this->depositList;
    }

    public function amount()
    {
        return $this->amount;
    }

    public function paid()
    {
        return array_reduce($this->depositList, function ($paid, Deposit $deposit) {
            return $paid + $deposit->amount();
        }, 0);
    }

    public function leftToPay()
    {
        return $this->amount() - $this->paid();
    }

    public function name()
    {
        return $this->name;
    }
}
