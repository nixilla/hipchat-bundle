<?php

namespace spec\Nixilla\HipchatBundle\Command;

use Nixilla\HipchatBundle\Command\TestCommand;
use Nixilla\HipchatBundle\Service\HipchatNotifier;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommandSpec extends ObjectBehavior
{
    function let(HipchatNotifier $notifier)
    {
        $this->beConstructedWith($notifier);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TestCommand::class);
        $this->shouldHaveType(Command::class);
    }

    function it_implements_execute_method(InputInterface $input, OutputInterface $output, HipchatNotifier $notifier)
    {
        $output->write(Argument::any())->shouldBeCalled();
        $output->writeln(Argument::any())->shouldBeCalled();

        $input->getOption(Argument::any())->shouldBeCalled();
        $input->getArgument(Argument::any())->shouldBeCalled();

        $notifier->notify(Argument::any(), Argument::any(), Argument::any(), Argument::any())->shouldBeCalled();

        $this->execute($input, $output);
    }
}
