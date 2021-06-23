<?php
declare(strict_types = 1);

/** @var int Количество элементов в массиве */
const COUNT_ITEM = 1000000;

/** @var int Какой элемент ищем */
const SEARCH_ITEM = 999999;

$inArray = [];
$arrayKeyExists = [];

if (SEARCH_ITEM > COUNT_ITEM) {
    printf("Error: SEARCH_ITEM is greater than COUNT_ITEM");
    exit();
}

function testPerformance(string $name, Closure $closure): void
{
    $start = microtime(true);
    $closure();
    $end = microtime(true);
    printf("Test performance %s took %.5f seconds\n", $name, $end - $start);
}

for ($i = 0; $i < COUNT_ITEM; $i++) {
    $inArray[] = $i;
    $arrayKeyExists[$i] = true;
}

$testInArray = function () use ($inArray) {
    in_array(SEARCH_ITEM, $inArray);
};

$testArrayKeyExists= function () use ($arrayKeyExists) {
    array_key_exists(SEARCH_ITEM, $arrayKeyExists);
};

testPerformance('testInArray', $testInArray);
testPerformance('testArrayKeyExists', $testArrayKeyExists);
