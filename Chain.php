<?php

require_once 'Point.php';

class Chain
{
    private $pointsOfChain = [];

    public function createChain(array $arrayOfCoordinates)
    {
        foreach ($arrayOfCoordinates as $coordinates) {
            $point = new Point($coordinates[0], $coordinates[1]);
            $this->pointsOfChain[] = $point;
            $count = count($this->pointsOfChain);
            if ($count > 1) {
                $this->pointsOfChain[$count - 2]->setConnection($this->pointsOfChain[$count - 1]);
                $this->pointsOfChain[$count - 1]->setConnection($this->pointsOfChain[$count - 2]);
            }
        }
    }

    public function addPoint(Point $point)
    {
        $this->pointsOfChain[] = $point;
        $count = count($this->pointsOfChain);
        if ($count > 1) {
            $this->pointsOfChain[$count - 2]->setConnection($this->pointsOfChain[$count - 1]);
            $this->pointsOfChain[$count - 1]->setConnection($this->pointsOfChain[$count - 2]);
        }
    }

    public function getLength()
    {
        $lengthOfChain = 0;
        foreach ($this->pointsOfChain as $key => $point) {
            if ($key == 0) {
                continue;
            }
            $x1 = $this->pointsOfChain[$key]->oX;
            $y1 = $this->pointsOfChain[$key]->oY;
            $x2 = $this->pointsOfChain[$key - 1]->oX;
            $y2 = $this->pointsOfChain[$key - 1]->oY;
            $distance = sqrt(pow($y2 - $y1, 2) + pow($x2 - $x1 , 2));
            $lengthOfChain = $lengthOfChain + $distance;
        }
        return $lengthOfChain;
    }
}