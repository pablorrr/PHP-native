<?php


//funkcja wariadyczna akceptuje zmienna liczbe argumentow
function sum(...$numbers)
{
    $total = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        $total += $numbers[$i];
    }

    return $total;
}
echo sum(10, 20) . '<br>'; // 30
echo sum(10, 20, 30) . '<br>'; // 60
