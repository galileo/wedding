<?php

namespace AppBundle\Entity;

use AppBundle\Library\Model\Amount;
use AppBundle\Library\Model\DepositId;

class Deposit
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var Amount
     */
    private $amount;

    /**
     * @var string
     */
    private $message;

    /**
     * @var Expense
     */
    private $expense;

    public function __construct(DepositId $depositId, Expense $expense, Amount $amount, $message = '')
    {
        $this->id = $depositId->id();
        $this->expense = $expense;
        $this->amount = $amount->amount();
        $this->message = $message;
    }

    private static function provideNew(Expense $expense, Amount $amount, $message)
    {
        return new Deposit(DepositId::generate(), $expense, $amount, $message);
    }

    public static function registerForExpense(Expense $expense, Amount $amount, $message = '')
    {
        $deposit = Deposit::provideNew($expense, $amount, $message);

        $expense->deposit($deposit);;

        return $deposit;
    }

    public function id()
    {
        return $this->id;
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
