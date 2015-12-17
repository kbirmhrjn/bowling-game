<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FizzBuzzSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\FizzBuzz');
    }

    public function it_tranlate_1_for_fizzbuzz()
    {
        $this->execute(1)->shouldBe(1);
    }

    public function it_translates_2_for_fizzbuzz()
    {
        $this->execute(2)->shouldReturn(2);
    }
    public function it_translates_3_for_fizzbuzz()
    {
        $this->execute(3)->shouldReturn('fizz');
    }
    public function it_translates_5_for_fizzbuzz()
    {
        $this->execute(5)->shouldReturn('buzz');
    }
    public function it_translates_6_for_fizzbuzz()
    {
        $this->execute(6)->shouldReturn('fizz');
    }
    public function it_translates_10_for_fizzbuzz()
    {
        $this->execute(10)->shouldReturn('buzz');
    }
    public function it_translates_15_for_fizzbuzz()
    {
        $this->execute(15)->shouldReturn('fizzbuzz');
    }
    public function it_translates_153_for_fizzbuzz()
    {
        $this->execute(153)->shouldReturn('fizz');
    }

    public function it_translates_a_sequence_of_numbers_for_fizzbuzz()
    {
        $this->executeUpTo(10)->shouldReturn([1,2,'fizz',4, 'buzz', 'fizz', 7,8,'fizz','buzz']);
    }
}
