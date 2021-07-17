<?php

/**
 * Associative Array Count Values
 *
 * Returns an array containing the number of values for a given $key in a given associative $array
 *
 * @param array $array The associative array to count values for
 * @param String $key The key to count values for
 * @return array A new array containing the counted values for the key in the original associative array
 */

function fcn_asscArrayCountValue($array, $key)
{
    foreach ($array as $row) {
        $new_array[] = $row[$key];
    }
    return array_count_values($new_array);
}
