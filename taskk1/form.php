<?php

if(!isset($_POST['task'])){
    echo "No task selected";
    exit;
}

$task = $_POST['task'];


// ================= Task 1 =================
// FIX: age >= 18 (not just > 18)
if($task == "age"){
    $age = $_POST['age'];

    if($age >= 18){
        echo "Allowed to register on the website";
    } else {
        echo "Not Allowed - You must be 18 or older";
    }
}


// ================= Task 2 =================
// FIX: function that prints multiplication, difference, division
elseif($task == "calc"){
    function calcTwoNumbers($n1, $n2){
        echo "Multiplication: " . ($n1 * $n2) . "<br>";
        echo "Difference: "     . ($n1 - $n2) . "<br>";
        if($n2 != 0){
            echo "Division: "   . ($n1 / $n2) . "<br>";
        } else {
            echo "Division: Cannot divide by zero";
        }
    }
    calcTwoNumbers($_POST['num1'], $_POST['num2']);
}


// ================= Task 3 =================
elseif($task == "sumArray"){
    function sumArr($arr){
        $total = 0;
        foreach($arr as $num){
            $total += $num;
        }
        return $total;
    }
    $arr = explode(",", $_POST['numbers']);
    echo "Sum = " . sumArr($arr);
}


// ================= Task 4 =================
// FIX: use manual loop with break (not in_array)
elseif($task == "search"){
    $films   = ["Fast","Predestination","Persuit","Prestige"];
    $keyword = $_POST['keyword'];
    $found   = false;

    for($i = 0; $i < count($films); $i++){
        if($films[$i] == $keyword){
            $found = true;
            break;   // exit loop as soon as film is found
        }
    }

    echo $found ? "Yes" : "No";
}


// ================= Task 5 =================
// FIX: wrapped in function named RouteBubble
elseif($task == "bubble"){
    function RouteBubble($arr){
        $n = count($arr);
        for($i = 0; $i < $n; $i++){
            for($j = 0; $j < $n - 1; $j++){
                if($arr[$j] > $arr[$j+1]){
                    $temp      = $arr[$j];
                    $arr[$j]   = $arr[$j+1];
                    $arr[$j+1] = $temp;
                }
            }
        }
        return $arr;
    }
    $arr    = explode(",", $_POST['numbers']);
    $sorted = RouteBubble($arr);
    echo implode("  ", $sorted);
}


// ================= Task 6 =================
elseif($task == "max"){
    $arr = explode(",", $_POST['numbers']);
    $max = $arr[0];
    foreach($arr as $num){
        if($num > $max) $max = $num;
    }
    echo "Max = " . $max;
}


// ================= Task 7 =================
elseif($task == "count"){
    $films   = explode(",", $_POST['films']);
    $keyword = $_POST['keyword'];
    $count   = 0;
    foreach($films as $f){
        if($f == $keyword) $count++;
    }
    echo "Count = " . $count;
}


// ================= Task 8 =================
// FIX: wrapped in function named RouteRandomPass
elseif($task == "random"){
    function RouteRandomPass($len){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $pass  = "";
        for($i = 0; $i < $len; $i++){
            $pass .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $pass;
    }
    $len = $_POST['length'];
    echo "Password: " . RouteRandomPass($len);
}


// ================= Task 9 =================
// NEW: display all non-boolean values normally,
//      display boolean values as Yes / No
elseif($task == "boolean"){
    $tests = array(1, "tariq", 1.5, true, 7, 's', false);

    foreach($tests as $item){
        if(is_bool($item)){
            echo ($item ? "Yes" : "No") . "<br>";
        } else {
            echo $item . "<br>";
        }
    }
}


// ================= Task 10 =================
// FIX: manual bubble sort instead of built-in sort()
elseif($task == "sort"){
    $arr = explode(",", $_POST['numbers']);
    $n   = count($arr);
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $n - 1; $j++){
            if($arr[$j] > $arr[$j+1]){
                $temp      = $arr[$j];
                $arr[$j]   = $arr[$j+1];
                $arr[$j+1] = $temp;
            }
        }
    }
    echo implode("  ", $arr);
}


// ================= Task 11 =================
elseif($task == "common"){
    $a1     = explode(",", $_POST['arr1']);
    $a2     = explode(",", $_POST['arr2']);
    $common = array_intersect($a1, $a2);
    echo implode(" - ", $common);
}


// ================= Task 12 =================
// FIX: added validation for negative numbers and non-numeric input
elseif($task == "ecommerce"){
    $price = $_POST['price'];
    $qty   = $_POST['qty'];

    // Validate: must be numeric
    if(!is_numeric($price) || !is_numeric($qty)){
        echo "Error: Please enter numbers only, not letters";
        exit;
    }

    // Validate: no negative numbers
    if($price < 0 || $qty < 0){
        echo "Error: Negative numbers are not allowed";
        exit;
    }

    $total    = $price * $qty;
    $discount = ($total < 1000) ? 10 : 15;
    $discAmt  = $total * $discount / 100;
    $final    = $total - $discAmt;

    echo "Total before discount: $" . $total    . "<br>";
    echo "Discount: "               . $discount . "% = $" . $discAmt . "<br>";
    echo "Total after discount: $"  . $final;
}

?>

