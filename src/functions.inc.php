<?php

namespace App;

/**
 * Function to determine the overall classification of degree, using the following university
 * guidelines: For Master’s Degrees, a pass with distinction will be awarded only when the following
 * three conditions have been satisfied: 
 * 
 * - an overall programme mark of 70+ is achieved
 * - a mark of 70+ is achieved in the dissertation module
 * - a weighted average (truncated to an integer) of 65+ is achieved in the other modules
 */

function getTotal(array $input): String
{

    $programmingx2 = doubleWeighted($input);

    // Find total marks scored by user
    $total = sumArray($programmingx2);

    // Find total marks available
    $total_marks = count($programmingx2) * 100;

    //Format nicely
    $total = "Total marks: " . $total . "/" . $total_marks;

    return $total;
}

/**
 * Method that accounts for the double weighting of the
 * Programming module and adds it twice to the array
 */
function doubleWeighted(array $array): array
{

    $programmingx2 = array();

    foreach ($array as $key => $value) {
        if ($key == 'Programming') {
            $array['Programming2'] = $value;
        }
    }

    return $array;
}

/**
 * Method to total all values of an array to find
 * the total score of all modules
 * 
 */
function sumArray(array $array): float
{

    $array = array_filter($array);
    // Ensure no empty values for accuracy
    if (count($array)) {
        $total = array_sum($array);
    }


    return $total;
}
