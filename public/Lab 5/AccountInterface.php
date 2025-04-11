<?php

interface AccountInterface {
    // Метод для поповнення рахунку
    public function deposit($amount);
    // Метод для зняття коштів з рахунку
    public function withdraw($amount);
    // Метод для отримання поточного балансу
    public function getBalance();
}
