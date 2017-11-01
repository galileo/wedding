<?php

namespace AppBundle\Entity;

use AppBundle\Library\Model\Amount;
use AppBundle\Library\Model\DepositId;
use DateTime;

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

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var DateTime
     */
    private $updatedAt;

    public function __construct(DepositId $depositId, Expense $expense = null, Amount $amount, $message = '')
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

    public static function provideEmpty()
    {
        return new Deposit(DepositId::generate(), null, new Amount(0), 'Default');
    }

    public function __toString()
    {
        return (string)$this->amount;
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

    public function expense()
    {
        return $this->expense;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param Amount $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param Expense $expense
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
    }

    /**
     * @return DateTime
     */
    public function createdAt()
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function updatedAt()
    {
        return $this->updatedAt;
    }
}
