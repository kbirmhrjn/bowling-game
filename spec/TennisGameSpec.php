<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\Player;
class TennisGameSpec extends ObjectBehavior
{
    protected $john;
    protected $jane;

    public function let()
    {
        $this->john = new Player('John Doe', 0);
        $this->jane = new Player('Jane Doe', 0);
        $this->beConstructedWith($this->john, $this->jane);
    }
    public function it_scores_a_scoreless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }

    public function it_scores_a_1_0_game()
    {
        $this->john->earnPoints(1);
        $this->score()->shouldReturn('Fifteen-Love');
    }

    public function it_scores_a_2_0_game()
    {
        $this->john->earnPoints(2);
        $this->score()->shouldReturn('Thrity-Love');
    }
    public function it_scores_a_3_0_game()
    {
        $this->john->earnPoints(3);
        $this->score()->shouldReturn('Fourty-Love');
    }

    public function it_scores_a_4_0_game()
    {
        $this->john->earnPoints(4);
        $this->score()->shouldReturn('Win for John Doe');
    }

    public function it_scores_a_0_4_game()
    {
        $this->jane->earnPoints(4);
        $this->score()->shouldReturn('Win for Jane Doe');
    }

    public function it_scores_a_4_3_game()
    {
        $this->jane->earnPoints(3);
        $this->john->earnPoints(4);
        $this->score()->shouldReturn('Advantage John Doe');
    }

     public function it_scores_a_4_4_game()
    {
        $this->jane->earnPoints(3);
        $this->john->earnPoints(3);
        $this->score()->shouldReturn('Deuce');
    }

    public function it_scores_a_3_4_game()
    {
        $this->jane->earnPoints(4);
        $this->john->earnPoints(3);
        $this->score()->shouldReturn('Advantage Jane Doe');
    }
}
