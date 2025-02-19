<?php
$matrix = [ 
    [12, 23, 34], 
    [45, 55, 62], 
    [71, 84, 90] 
];

$row = 0;

while ($row < count($matrix)) {
    $col = 0;

    while ($col < count($matrix[$row])) {
        if ($matrix[$row][$col] % 2 == 0) {
            echo $matrix[$row][$col] . "\n";
        }
        $col++;
    }
    $row++;
}
?>
