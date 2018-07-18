<?php
error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);


class Stats
{
    private $data;

    public function collect($arg, $time)
    {
        $this->data[$arg] = $time;
    }

    public function getResult()
    {
        echo 'top candidates:'."\n";
        arsort($this->data);
        var_dump($this->data);
    }
}


function runAndMeasure($arg)
{
    $start = microtime(true);
    exec('php compare.php '.$arg);
    $end = microtime(true);
    return $end - $start;
}

function measure($arg)
{
    $minTime = 10;

    for ($i = 0; $i < 1500; $i++) {
        //usleep(8);
        $time = runAndMeasure($arg);
        if ($time < $minTime) {
            $minTime = $time;
        }
    }

    return $minTime;
}


function bruteforce() {
    $lines = array('aaaaa', 'aaaab', 'aaaac', 'mw3bq', 'zzzzy', 'zzzzz');

    foreach  ($lines as $line) {
        yield $line;
    }
}


$stat = new Stats();

foreach (bruteforce() as $arg) {
    $time = measure($arg);
    $stat->collect($arg, $time);
}

$stat->getResult();
