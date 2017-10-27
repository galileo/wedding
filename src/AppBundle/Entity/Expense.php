<?php

namespace AppBundle\Entity;

use AppBundle\Library\Model\Amount;
use AppBundle\Library\Model\Budget;
use AppBundle\Library\Model\ExpenseId;
use Doctrine\Common\Collections\ArrayCollection;

class Expense
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $deposits;

    public function __construct(ExpenseId $expenseId, $name, Amount $amount)
    {
        $this->id = $expenseId->id();
        $this->name = $name;
        $this->amount = $amount->amount();
        $this->deposits = new ArrayCollection();
    }

    public static function intoBudget(Budget $budget, $name, Amount $amount)
    {
        $expense = Expense::provideNew($name, $amount);
        $budget->register($expense);

        return $expense;
    }

    private static function provideNew($name, Amount $amount)
    {
        return new Expense(ExpenseId::generate(), $name, $amount);
    }

    public function __toString()
    {
        return $this->name();
    }

    public function id()
    {
        return $this->id;
    }

    public function deposit(Deposit $deposit)
    {
        $this->deposits->add($deposit);
    }

    public function deposits()
    {
        return $this->deposits->toArray();
    }

    public function amount()
    {
        return $this->amount;
    }

    public function paid()
    {
        return array_reduce($this->deposits->toArray(), function ($paid, Deposit $deposit) {
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

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
