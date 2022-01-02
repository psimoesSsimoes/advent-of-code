<?php

include_once('/Users/seomis/advent-of-code/2021/php/shared/input_retriever.php');

$strArr = extractInputForDay(2);
printf("======== DAY TWO =======\n");
printf("first solution is %d \n" , dive($strArr));
printf("second solution is %d \n" , diveWithAim($strArr));

function dive($strArr) {
    $x=0;
    $y=0;
    foreach ($strArr as &$value){
        $movements=explode(" ",$value);
        switch ($movements[0]){
            case "forward":
                $x+=intval($movements[1]);
                break;
            case "down":
                $y+=intval($movements[1]);
                break;
            case "up":
                $y-=intval($movements[1]);
        };
    }

    return $x*$y;
}

function diveWithAim($strArr) {
    $x=0;
    $y=0;
    $aim=0;
    foreach ($strArr as &$value){
        $movements=explode(" ",$value);
        switch ($movements[0]){
            case "forward":
                $x+=intval($movements[1]);
                $y+=$aim*intval($movements[1]);
                break;
            case "down":
                $aim+=intval($movements[1]);
                break;
            case "up":
                $aim-=intval($movements[1]);
        };
    }

    return $x*$y;
}
?>
