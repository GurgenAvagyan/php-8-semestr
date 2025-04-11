<?php

require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    // Конструктор для створення рахунку з валютою та початковим балансом
    public function __construct($currency, $initialBalance = 0) {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути менше " . self::MIN_BALANCE);
        }

        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    // Поповнення рахунку
    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення має бути додатньою.");
        }
        $this->balance += $amount;
    }

    // Зняття коштів з рахунку
    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття має бути додатньою.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
    }

    // Отримання поточного балансу
    public function getBalance() {
        return $this->balance;
    }

    // Отримання валюти рахунку
    public function getCurrency() {
        return $this->currency;
    }
}
