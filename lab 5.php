<?php
// 1. count
function my_count($array) {
    $count = 0;
    foreach ($array as $item) {
        $count++;
    }
    return $count;
}

$arr = [1, 2, 3];
echo "Count: " . my_count($arr) . "\n";


// 2. array_diff
function my_array_diff($arr1, $arr2) {
    $result = [];
    foreach ($arr1 as $value) {
        if (!in_array($value, $arr2)) {
            $result[] = $value;
        }
    }
    return $result;
}

print_r(my_array_diff([1,2,3], [2,3,4]));

// 3. array_intersect
function my_array_intersect($arr1, $arr2) {
    $result = [];
    foreach ($arr1 as $value) {
        if (in_array($value, $arr2)) {
            $result[] = $value;
        }
    }
    return $result;
}

print_r(my_array_intersect([1,2,3], [2,3,4]));


// 4. array_key_exists
function my_array_key_exists($key, $array) {
    foreach ($array as $k => $v) {
        if ($k === $key) return true;
    }
    return false;
}

echo my_array_key_exists('a', ['a'=>1,'b'=>2]) ? "Yes\n" : "No\n"; // Yes


// 5. array_keys
function my_array_keys($array) {
    $keys = [];
    foreach ($array as $k => $v) {
        $keys[] = $k;
    }
    return $keys;
}

print_r(my_array_keys(['a'=>1,'b'=>2]));

// 6. array_values
function my_array_values($array) {
    $values = [];
    foreach ($array as $v) {
        $values[] = $v;
    }
    return $values;
}

print_r(my_array_values(['a'=>1,'b'=>2]));

// 7. array_merge
function my_array_merge($arr1, $arr2) {
    $result = [];
    foreach ($arr1 as $v) $result[] = $v;
    foreach ($arr2 as $v) $result[] = $v;
    return $result;
}

print_r(my_array_merge([1,2],[3,4]));

// 8. array_rand
function my_array_rand($array) {
    $keys = my_array_keys($array);
    $rand_index = rand(0, my_count($keys)-1);
    return $keys[$rand_index];
}

$arr = ['a'=>1,'b'=>2,'c'=>3];
echo "Random key: " . my_array_rand($arr) . "\n";


// 9. array_reverse
function my_array_reverse($array) {
    $result = [];
    foreach ($array as $v) {
        array_unshift($result, $v);
    }
    return $result;
}

print_r(my_array_reverse([1,2,3]));


// 10. compact
$a = 10; $b = 20;
function my_compact(...$names) {
    $result = [];
    foreach ($names as $name) {
        if (isset($GLOBALS[$name])) {
            $result[$name] = $GLOBALS[$name];
        }
    }
    return $result;
}

print_r(my_compact('a','b'));


// 11. extract
function my_extract($array) {
    foreach ($array as $k => $v) {
        $GLOBALS[$k] = $v;
    }
}

my_extract(['x'=>5,'y'=>7]);

global $x, $y;
echo "x = $x, y = $y\n";

// 12. asort
function my_asort($array) {
    $keys = my_array_keys($array);
    $values = my_array_values($array);

    for ($i=0; $i<my_count($values); $i++) {
        for ($j=$i+1; $j<my_count($values); $j++) {
            if ($values[$i] > $values[$j]) {
                $tmp = $values[$i]; $values[$i] = $values[$j]; $values[$j] = $tmp;

                $tmp = $keys[$i]; $keys[$i] = $keys[$j]; $keys[$j] = $tmp;
            }
        }
    }

    $result = [];
    for ($i=0; $i<my_count($keys); $i++) {
        $result[$keys[$i]] = $values[$i];
    }

    return $result;
}

print_r(my_asort(['a'=>3,'b'=>1,'c'=>2]));


// 13. arsort
function my_arsort($array) {
    $sorted = my_asort($array);
    return my_array_reverse_assoc($sorted);
}


function my_array_reverse_assoc($array) {
    $result = [];
    foreach ($array as $k => $v) {
        $result = [$k => $v] + $result;
    }
    return $result;
}

print_r(my_arsort(['a'=>3,'b'=>1,'c'=>2]));
// 14. sort
function my_sort($array) {
    $values = my_array_values($array);
    for ($i=0; $i<my_count($values); $i++) {
        for ($j=$i+1; $j<my_count($values); $j++) {
            if ($values[$i] > $values[$j]) {
                $tmp = $values[$i]; $values[$i] = $values[$j]; $values[$j] = $tmp;
            }
        }
    }
    return $values;
}

print_r(my_sort([3,1,2]));

//------------------
// 15. rsort
function my_rsort($array) {
    return my_array_reverse(my_sort($array));
}

print_r(my_rsort([3,1,2]));

?>