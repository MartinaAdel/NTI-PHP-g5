<?php

$first_num = 10;
$second_num = 20;
$operator = '+';

switch ($operator) {
    case '+':
        echo 'Result = ' . ($first_num + $second_num);
        break;

    case '-':
        echo 'Result = ' . ($first_num - $second_num);
        break;

    case '*':

        echo 'Result = ' . ($first_num * $second_num);
        break;

    case '/':
        if ($second_num != 0) {
            echo 'Result = ' . ($first_num / $second_num);
        } else {
            echo "You can't divide by zero";
        }

        break;

    default:
        echo 'Invalid operator';
        break;
}
