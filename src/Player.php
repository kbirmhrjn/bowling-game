<?php

namespace App;

class Player
{
    public $name;
    public $points;

    function __construct($name,$points)
    {
        $this->name = $name;
        $this->points = $points;
    }

    public function earnPoints($points)
    {
        $this->points = $points;
    }
}