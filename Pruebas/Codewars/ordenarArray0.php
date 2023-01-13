<?php
function moveZeros(array $items): array
{
    foreach ($items as $item => $val) {
        if (is_numeric($val) && intval($val, 10) === 0) 
        {
            unset($items[$item]);
            array_push($items, 0);
        }
    }
    return array_values($items);
}

echo '<pre>' , var_dump(moveZeros(["a","b","c","d",1,1,3,1,9,9,0,0,0,0,0,0,0,0,0,0])), '</pre>';
 // returns[false,1,1,2,1,3,"a",0,0]
echo "<br>";echo "<br>";
echo '<pre>' , var_dump(moveZeros(["a",0,0,"b","c","d",0,1,0,1,0,3,0,1,9,0,0,0,0,9])), '</pre>';// returns[false,1,1,2,1,3,"a",0,0]
