<?php

function timeGuess()
{
    $char = 'a';
    $total = 0;
    $count = 0;

    do {
        for ($i = 0; $i < 99; $i++) {
            $arg = str_repeat($char, 5);
            $time = runAndMeasure($arg);
            $count++;
            $total += $time;
        }
        $char++;
    } while($char != 'z');

    return $total / $count;
}

function runAndMeasure($arg)
{
    $start = microtime(true);
    exec('php compare.php '.$arg);
    $end = microtime(true);
    return $end - $start;
}

function correctGuess()
{
    $total = 0;
    $count = 0;

    for ($i = 0; $i < 99; $i++) {
        $arg = 'mw3bq';
        $time = runAndMeasure($arg);
        $count++;
        $total += $time;
    }

    return $total / $count;
}

$failTime = timeGuess();
var_dump($failTime);

$goodTime = timeGuess();
var_dump($goodTime);

//var_dump($output, $end-$start);