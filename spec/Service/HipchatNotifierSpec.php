<?php

namespace spec\Nixilla\HipchatBundle\Service;

use Buzz\Browser;
use Nixilla\HipchatBundle\Service\HipchatNotifier;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HipchatNotifierSpec extends ObjectBehavior
{
    function let(Browser $client)
    {
        $this->beConstructedWith($client, $domain = 'https://hipchat.com', $token = 'token', $room = 123);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(HipchatNotifier::class);
    }

    function it_can_notify_room(Browser $client)
    {
        $client->post(Argument::any(), Argument::any(), Argument::any())->shouldBeCalled();
        $this->notify(Argument::any(), Argument::any());
    }
}
