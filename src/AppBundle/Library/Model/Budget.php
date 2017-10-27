<?php

namespace AppBundle\Library\Model;

use AppBundle\Entity\Deposit;
use AppBundle\Entity\Expense;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;

class Budget
{
    private $expenseList;

    public function __construct($expenses = [])
    {
        $this->expenseList = new ArrayCollection();

        foreach ($expenses as $expense) {
            $this->register($expense);
        }
    }

    public function register(Expense $expense)
    {
        $this->expenseList->set($expense->id(), $expense);
    }

    /**
     * @return Expense[]
     */
    public function expenses()
    {
        return $this->expenseList->toArray();
    }

    public function total()
    {
        return array_reduce($this->expenseList->toArray(), function ($sum, Expense $expense) {
            return $sum + $expense->amount();
        }, 0);
    }

    public function paid()
    {
        return array_reduce($this->expenseList->toArray(), function ($sum, Expense $expense) {
            return $sum + $expense->paid();
        }, 0);
    }

    public function leftToPay()
    {
        return array_reduce($this->expenseList->toArray(), function ($sum, Expense $expense) {
            return $sum + $expense->leftToPay();
        }, 0);
    }

    /**
     * @param string $name
     * @param float $value
     *
     * @return string
     */
    public function expense($name, $value)
    {
        $expense = Expense::intoBudget($this, $name, new Amount($value));

        return $expense->id();
    }

    public function spend($weddingId, $value)
    {
        /** @var Expense $expense */
        $expense = $this->expenseList->get($weddingId);
        $deposit = Deposit::registerForExpense($expense, new Amount($value));

        return $deposit->id();
    }

    public function save(ObjectManager $objectManager)
    {
        foreach ($this->expenseList as $expense) {
            $objectManager->persist($expense);
        }

        $objectManager->flush();
    }
}
