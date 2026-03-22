<?php

// my_strlen()
function my_strlen($str){
    $count = 0;
    while(isset($str[$count])){
        $count++;
    }
    return $count;
}
echo my_strlen('Hello World') . "<br>";


// my_substr
function my_substr($str, $start, $length = null)
{
    $result = '';
    $str_len = 0;

    while (isset($str[$str_len])){
        $str_len++;
    }

    if ($length === null){
        $length = $str_len - $start;
    }

    if ($length < 0){
        $length = $str_len - $start + $length;
    }

    for ($i = $start; $i < $start + $length; $i++){
        if(!isset($str[$i])) break;
        $result .= $str[$i];
    }

    return $result;
}
echo my_substr('Hello World', 6, 5) . "<br>";


// str_count
function my_substr_count($str, $substr){
    $count = 0;
    for ($i = 0; isset($str[$i]); $i++){
        if(my_substr($str, $i, my_strlen($substr)) == $substr){
            $count++;
        }
    }
    return $count;
}

function str_count($str, $substr){
    return my_substr_count($str, $substr);
}
echo str_count('hello', 'l') . "<br>";


// no_spaces
function no_spaces(string $str): string{
    return str_replace(" ", "", $str);
}
echo no_spaces('Hello World') . "<br>";


// max_number
function max_number(int $num) : int
{
    $digits = str_split($num);
    rsort($digits);
    return (int)implode('', $digits);
}
echo max_number(123);

?>