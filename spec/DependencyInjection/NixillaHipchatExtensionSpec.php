<?php

namespace spec\Nixilla\HipchatBundle\DependencyInjection;

use Nixilla\HipchatBundle\DependencyInjection\NixillaHipchatExtension;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class NixillaHipchatExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(NixillaHipchatExtension::class);
        $this->shouldHaveType(Extension::class);
    }

    function it_loads_configuration_from_file(ContainerBuilder $container)
    {
        $this->load($configs = [], $container);
    }
}
