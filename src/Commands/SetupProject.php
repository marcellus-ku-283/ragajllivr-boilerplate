<?php

namespace Parth1895\RagajllivrBoilerplate\Commands;

use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SetupProject extends Command
{

    public const REST = 'restAPIs';
    public const GRAPHQL = 'graphQLAPIs';
    public const JETSLIVE = 'jetstreamLivewire';

    protected $setupOptions = [
        self::REST,
        self::GRAPHQL,
        self::JETSLIVE
    ];
    /**
     * The name of the command (the part after "bin/demo").
     *
     * @var string
     */
    protected static $defaultName = 'askQ';

    /**
     * The command description shown when running "php bin/demo list".
     *
     * @var string
     */
    protected static $defaultDescription = 'Initialte setup for laravel project options.';

    /**
     * Execute the command
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * @return int 0 if everything went fine, or an exit code.
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            'Please select your setup for your project from below  (defaults to rest-APIs)',
            $this->setupOptions,
            0
        );

        $question->setErrorMessage('Setup %s is invalid.');
        
        $setup = $helper->ask($input, $output, $question);

        if ($setup == self::REST){
            // WIP: If res api selected need to set up laravel with all rest set up.


            $command = $this->getApplication()->find('create-project laravel/laravel');
            $command->run();
            $output->writeln('YUppir You have just selected: '.$setup);    
        }
        $output->writeln('You have just selected: '.$setup);
        

        return Command::SUCCESS;
    }
}