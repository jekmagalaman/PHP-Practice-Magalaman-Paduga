<?php

function calculateTotalPrice(array $items): float {
    $totalPrice = 0;
    foreach ($items as $item) {
        $totalPrice += $item['price'];
    }
    return $totalPrice;
}

function modifyString(string $inputString): string {
    $modifiedString = str_replace(' ', '', $inputString);
    $modifiedString = strtolower($modifiedString);
    return $modifiedString;
}

function checkEvenOrOdd(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

$totalPrice = calculateTotalPrice($items);
echo "Total price: $$totalPrice\n";

$string = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyString($string);
echo "Modified string: $modifiedString\n";

$number = 42;
echo checkEvenOrOdd($number) . "\n";

?>
