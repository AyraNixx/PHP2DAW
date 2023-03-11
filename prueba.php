<?php

function chooseBestSum($t, $k, $ls) {
    
  $combinations = combinations($ls, $k);
    $best_sum = -1;
    foreach ($combinations as $combination) {
        $sum = array_sum($combination);
        if ($sum <= $t && $sum > $best_sum) {
            $best_sum = $sum;
        }
    }
    return ($best_sum == -1) ? null : $best_sum;
}

function combinations($arr, $k) {
    if ($k == 0) {
        return [[]];
    }
    if (count($arr) == 0) {
        return [];
    }
    $result = [];
    $head = $arr[0];
    $tail = array_slice($arr, 1);
    foreach (combinations($tail, $k - 1) as $comb) {
        array_push($result, array_merge([$head], $comb));
    }
    foreach (combinations($tail, $k) as $comb) {
        array_push($result, $comb);
    }
    return $result;
}