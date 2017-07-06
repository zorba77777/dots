<?php

class Point
{
    public $oX;
    public $oY;
    private $firstConnection;
    private $secondConnection;

    public function __construct($oX, $oY)
    {
        $this->oX = $oX;
        $this->oY = $oY;
    }

    public function setConnection(Point $point)
    {
        if (!$this->firstConnection) {
            $this->firstConnection = $point;
            return true;
        } elseif (!$this->secondConnection) {
            $this->secondConnection = $point;
            return true;
        } else {
            return false;
        }
    }
}