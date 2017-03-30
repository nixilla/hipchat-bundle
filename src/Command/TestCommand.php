<?php

namespace Nixilla\HipchatBundle\Command;

use Nixilla\HipchatBundle\Service\HipchatNotifier;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    /** @var HipchatNotifier */
    private $hipchat;

    /**
     * TestCommand constructor.
     * @param HipchatNotifier $hipchat
     */
    public function __construct(HipchatNotifier $hipchat)
    {
        $this->hipchat = $hipchat;

        parent::__construct();
    }

    public function configure()
    {
        $this
            ->setName('hipchat:test')
            ->setDescription('Sends test notification to Hipchat to check if everything is configured correctly')
            ->addOption('color', null, InputOption::VALUE_OPTIONAL, 'Which colour to use', 'red')
            ->addOption('notify', null, InputOption::VALUE_OPTIONAL, 'Whether to send notification', false)
            ->addArgument('message', InputArgument::OPTIONAL, 'Message to be sent', 'This is test from hipchat:test symfony command')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write(sprintf("Sending message: <info>%s</info> ... ", $input->getArgument('message')));

        $this->hipchat->notify(
            $input->getOption('color'),
            $input->getArgument('message'),
            $format = 'text',
            $notify = $input->getOption('notify')
        );

        $output->writeln('OK');
    }
}
