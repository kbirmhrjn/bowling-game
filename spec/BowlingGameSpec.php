<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    public function it_scores_a_gutter_game_zero()
    {
        $this->rollTimes(20, 0);
        $this->score()->shouldBe(0);
    }

    public function it_scores_the_sum_of_all_knocked_down_pins_for_a_game()
    {
        $this->rollTimes(20, 1);
        $this->score()->shouldBe(20);
    }

    public function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $this->rollSpare();
        $this->roll(5);
        $this->rollTimes(17, 0);

        $this->score()->shouldBe(20);
    }

    public function it_awards_a_two_roll_bonus_for_a_strike_in_the_previous_frame()
    {
        $this->roll(10);
        $this->roll(7);
        $this->roll(2);
        $this->rollTimes(17,0);
        $this->score()->shouldBe(28);
    }

    public function it_scores_a_perfect_game()
    {
        $this->rollTimes(12, 10);

        $this->score()->shouldBe(300);
    }

    public function it_should_throw_exception_during_invalid_argument()
    {
        $this->shouldThrow("InvalidArgumentException")->duringRoll(-10);
    }

    public function rollSpare()
    {
        $this->roll(2);
        $this->roll(8);
    }

    public function rollTimes($count, $pins)
    {
        for ($i=0; $i < $count; $i++)
        {
            $this->roll($pins);
        }
    }
}
