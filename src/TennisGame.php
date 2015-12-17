<?php

namespace App;

class TennisGame
{
    protected $player1;
    protected $player2;

    protected $lookup = [
                            0 => 'Love',
                            1 => 'Fifteen',
                            2 => 'Thrity',
                            3 => 'Fourty'
                        ];

    public function __construct(Player $player1,Player $player2)
    {
        $this->player2 = $player2;
        $this->player1 = $player1;
    }

    public function score()
    {
        if( $this->hasAWinner() )
        {
            return 'Win for '. $this->winner()->name;
        }

        if( $this->hasTheAdvantage() )
        {
            return 'Advantage ' . $this->winner()->name;
        }
        if($this->isDeuce())
        {
            return 'Deuce';
        }
        return $this->generalScore();
    }

    public function generalScore()
    {
        $score = $this->lookup[$this->player1->points] . '-';

        return $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->points];;
    }

    public function tied()
    {
        return $this->player1->points == $this->player2->points;
    }

    private function hasAWinner()
    {
        return $this->hasPointsToBeWon() && $this->isLeadingByAtleastTwo();
    }

    private function hasPointsToBeWon()
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    private function isLeadingByAtleastTwo()
    {
        return abs($this->player1->points- $this->player2->points) >= 2;
    }

    public function hasTheAdvantage()
    {
        return $this->hasPointsToBeWon() && abs($this->player1->points- $this->player2->points) == 1;
    }

    public function isDeuce()
    {
        return $this->player1->points + $this->player2->points >=6 && $this->tied();
    }

    private function winner()
    {
        return $this->player1->points > $this->player2->points
            ? $this->player1
            : $this->player2;
    }
}

