<?php
// TASK 1
echo "======TASK 1======";
echo "<br>Hello, World!<br>";
// <marquee direction="right">dog</marquee>

// TASK 2
echo "<br>======TASK 2======";
// Оголошення змінних різних типів
$stringVar = "Це рядок";
$intVar = 42;
$floatVar = 3.14;
$boolVar = true;
echo "<br>Рядок: " . $stringVar;
echo "<br>Ціле число: " . $intVar;
echo "<br>Число з плаваючою комою: " . $floatVar;
echo "<br>Булеве значення: " . ($boolVar ? 'true' : 'false');

// Виведення типу кожної змінної
echo "<br><br>Типи змінних:";
echo "<br>"; var_dump($stringVar);
echo "<br>"; var_dump($intVar);
echo "<br>"; var_dump($floatVar);
echo "<br>"; var_dump($boolVar);


// TASK 3
echo "<br><br>======TASK 3======";
$string1 = "Hello";
$string2 = "World!";
echo "<br>Конкатенація рядків: $string1 $string2";


// TASK 4
echo "<br><br>======TASK 4======";
$number = 15;
if ($number % 2 == 0) {
    echo "<br>Число $number є парним.";
} else {
    echo "<br>Число $number є непарним.";
}


// TASK 5
echo "<br><br>======TASK 5======";
// Цикл for: вивід чисел від 1 до 10
echo "<br>Цикл for:";
for ($i = 1; $i <= 10; $i++) {
    echo " $i";
}

// Цикл while: вивід чисел від 10 до 1
echo "<br>Цикл while:";
$j = 10;
while ($j >= 1) {
    echo " $j";
    $j--;
}


// TASK 6
echo "<br><br>======TASK 6======";
// Створення асоціативного масиву з інформацією про студента
$student = [
    "ім'я" => "Гурген",
    "прізвище" => "Авагян",
    "вік" => 21,
    "спеціальність" => "Програміст"
];

// Виведення значень масиву
echo "<br>Інформація про студента:";
foreach ($student as $key => $value) {
    echo "<br>$key: $value";
}

// Додавання нового елемента - середнього балу
$student["середній бал"] = 4.5;
echo "<br><br>Оновлена інформація про студента:";
foreach ($student as $key => $value) {
    echo "<br>$key: $value";
}
