<?php

namespace spec\Nixilla\HipchatBundle;

use Nixilla\HipchatBundle\NixillaHipchatBundle;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NixillaHipchatBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(NixillaHipchatBundle::class);
        $this->shouldHaveType(Bundle::class);
    }
}
