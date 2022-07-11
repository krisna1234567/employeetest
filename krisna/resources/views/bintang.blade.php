<?php

if ($type == 1) {
    for ($a = $data; $a > 0; $a--) {
        for ($b = $data; $b >= $a; $b--) {
            echo "*";
        }
        echo "\n";
    }
} elseif ($type == 2) {

    for ($a = 1; $a <= $data; $a++) {
        for ($c = $data; $c >= $a; $c -= 1) {
            echo "*";
        }
        echo "\n";
    }
} elseif ($type == 3) {

    for ($a = $data; $a > 0; $a--) {
        for ($i = 1; $i <= $a; $i++) {
            echo "_";
        }
        for ($a1 = $data; $a1 >= $a; $a1--) {
            echo "*";
        }
        echo "\n";
    }
} else {
    echo 'no type';
}
