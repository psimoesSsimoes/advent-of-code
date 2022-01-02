<?php

include_once('/Users/seomis/advent-of-code/2021/php/shared/input_retriever.php');

$strArr = extractInputForDay(1);
$strArrTwo = $strArr;
$slidingWindowSize=3;

printf("======== DAY ONE =======\n");
printf("first solution is %d \n" , countInputIncrease($strArr));
printf("second solution is %d\n" , countSlidingWindowIncrease($strArrTwo,$slidingWindowSize));


function countInputIncrease($strArr) {
    try {

        $result=0;
        // minus 1 because last element is empty
        for ($i = 0; $i < count($strArr)-1; $i++) {
            if (intval(current($strArr)) < intval(next($strArr))){
                $result+=1;
            }
        }

        return $result;
    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

function countSlidingWindowIncrease($arr, $window_size) {
     // Compute sum of first window of size k
     try{
        $window_previous = window($arr,0,$window_size);

        $result=0;
        for ($i = 1; $i < count($arr)-1; $i++) {
                $window= window($arr,$i,$window_size);
                if ($window>$window_previous){
                    $result+=1;
                }

                $window_previous=$window;

        }

     }catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
     }

     return $result;
}

function window($arr, $index, $window_size) {
    $result=0;
    for ( $i = $index; $i < $index+$window_size; $i++){
        if ($i >= count($arr)-1) {
            return $result;
        }

        $result += $arr[$i];
    }

    return $result;
}

?>
