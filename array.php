<?php
    $arr = array(1,0,1,0,0,1);
    $str1 = 'jalandhar';
    $str2 = 'chandigarh';

    //sort into accending
    sort($arr);
    //get length of array
    $arrlength = count($arr);
    //print values
    for($x = 0; $x < $arrlength; $x++) {
      echo $arr[$x];
      echo "<br>";
    }
    

    //split the string into array
    $str1Arr =  str_split($str1);
    $str2Arr =  str_split($str2);

    //compare array to get different values
    $result = array_diff($str1Arr,$str2Arr);
    echo "<pre>";
    print_r($result);
    echo "<br>";
    //compare and get common values
    $result1 = array_intersect($str1Arr,$str2Arr);
    print_r($result1);
?>
