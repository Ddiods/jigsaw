<?php

/**
 *
 * Find the first subset of two numbers of $M which sum $N
 *
 * @param array $M Set of integer numbers
 * @param int   $N Result of the sum
 *
 * @return array|null
 */
function process(array $M, int $N)
{
    $result = null;

    foreach ($M as $m1) {
        foreach ($M as $m2) {
            if ($m2 === $m1) {
                continue;
            }

            if ($m1 + $m2 === $N) {
                $result = [$m1, $m2];
                break;
            }
        }

        if ($result) {
            break;
        }
    }

    return $result;
}

$M = [5, 2, 8, 14, 0];
$N = 10;

print_r(process($M, $N));
