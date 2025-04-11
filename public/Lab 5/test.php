<?php

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

function testAccountOperations() {
    echo "СТВОРЕННЯ ЗВИЧАЙНОГО РАХУНКУ (USD)...<br>";
    $account1 = new BankAccount("USD", 100);
    $account1->deposit(50);
    echo "Баланс після поповнення: {$account1->getBalance()} {$account1->getCurrency()}<br>";

    $account1->withdraw(30);
    echo "Баланс після зняття: {$account1->getBalance()} {$account1->getCurrency()}<br>";

    echo "<br> СТВОРЕННЯ НАКОПИЧУВАЛЬНОГО РАХУНКУ (EUR)...<br>";
    $savings = new SavingsAccount("EUR", 200);
    $savings->deposit(100);
    echo "Баланс перед нарахуванням відсотків: {$savings->getBalance()} {$savings->getCurrency()}<br>";

    $savings->applyInterest();
    echo "Баланс після нарахування відсотків: {$savings->getBalance()} {$savings->getCurrency()}<br>";

    
    try {
        echo "<br> ПЕРЕВІРКА ОБРОБКИ ВИНЯТКУ (НЕГАТИВНЕ ПОПОВНЕННЯ)...<br>";
        $account1->deposit(-50);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "<br>";
    }
    

    try {
        echo "<br> ПЕРЕВІРКА ОБРОБКИ ВИНЯТКУ (НЕГАТИВНЕ ЗНЯТТЯ КОШТІВ)...<br>";
        $account1->withdraw(-50);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "<br>";
    }


    try {
        echo "<br> ПЕРЕВІРКА ОБРОБКИ ВИНЯТКУ (ЗНЯТТЯ БІЛЬШЕ НІЖ БАЛАНС)...<br>";
        $account1->withdraw(1000);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "<br>";
    }


    try {
        echo "<br> СТВОРЕННЯ РАХУНКУ З НЕГАТИВНИМ ПОЧАТКОВИМ БАЛАНСОМ...<br>";
        $badAccount = new BankAccount("USD", -100);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "<br>";
    }
}

testAccountOperations();
