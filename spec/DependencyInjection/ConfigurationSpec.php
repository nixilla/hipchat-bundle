<?php

namespace spec\Nixilla\HipchatBundle\DependencyInjection;

use Nixilla\HipchatBundle\DependencyInjection\Configuration;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class ConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Configuration::class);
        $this->shouldHaveType(ConfigurationInterface::class);
    }

    function it_implements_required_method()
    {
        $this->getConfigTreeBuilder()->shouldNotReturn(null);
    }
}
