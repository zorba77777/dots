<?php

require_once 'Chain.php';

$arrayOfCoordinates = [
    [1, 3],
    [2, 4]
];

$chain = new Chain();

$chain->createChain($arrayOfCoordinates);

$point = new Point(9, -7);

$chain->addPoint($point);

$length = $chain->getLength();

echo $length;