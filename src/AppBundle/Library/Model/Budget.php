<?php

namespace AppBundle\Library\Model;

class Budget
{
    private $expenseList = [];

    public function register(Expense $expense)
    {
        $this->expenseList[] = $expense;
    }

    /**
     * @return Expense[]
     */
    public function expenses()
    {
        return $this->expenseList;
    }

    public function total()
    {
        return array_reduce($this->expenseList, function ($sum, Expense $expense) {
            return $sum + $expense->amount();
        }, 0);
    }

    public function paid()
    {
        return array_reduce($this->expenseList, function ($sum, Expense $expense) {
            return $sum + $expense->paid();
        }, 0);
    }

    public function leftToPay()
    {
        return array_reduce($this->expenseList, function ($sum, Expense $expense) {
            return $sum + $expense->leftToPay();
        }, 0);
    }
}
