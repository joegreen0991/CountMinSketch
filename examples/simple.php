<?php

include __DIR__ . '/../vendor/autoload.php';

$sketch = new CountMinSketch();

$frequencyCounter = [];

$actualCounter = [];
$actualFrequencyCounter = [];

$a = 100000;

while($a--)
{
    $rand = rand(1000,20000);

    $newFreq = $sketch->updateQuery($rand, 1);


    isset($frequencyCounter[$newFreq - 1]) && $frequencyCounter[$newFreq - 1]--;
    isset($frequencyCounter[$newFreq]) ? $frequencyCounter[$newFreq]++ : $frequencyCounter[$newFreq] = 1;

    isset($actualCounter[$rand]) ? $actualCounter[$rand]++ : $actualCounter[$rand] = 1;
    $newActual = $actualCounter[$rand];

    isset($actualFrequencyCounter[$newActual - 1]) && $actualFrequencyCounter[$newActual - 1]--;
    isset($actualFrequencyCounter[$newActual]) ? $actualFrequencyCounter[$newActual]++ : $actualFrequencyCounter[$newActual] = 1;

}

$blah = $sketch->export();

$s = new CountMinSketch();

var_dump(array_diff($frequencyCounter, $actualFrequencyCounter));

var_dump(strlen($blah));