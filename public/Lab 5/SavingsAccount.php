<?php

require_once 'BankAccount.php';

class SavingsAccount extends BankAccount {
    // Статична відсоткова ставка (5%)
    public static $interestRate = 0.05;

    // Метод для нарахування відсотків на поточний баланс
    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
    }
}
