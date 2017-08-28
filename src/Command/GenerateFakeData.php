<?php
namespace CViniciusSDias\PHPHadoop\Command;

use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateFakeData extends Command
{
    /** @var Generator $faker */
    private $faker;

    protected function configure()
    {
        $this
            ->setName('generate-data')
            ->setDescription('Gera dados falsos para serem tratados com Hadoop')
            ->setProcessTitle('php-generate-fake-data');
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->faker = Factory::create('pt_BR');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        pcntl_fork();
        pcntl_fork();
        pcntl_fork();
        pcntl_fork();
        pcntl_fork();

        for ($i = 0; $i < 10000000; $i++) {
            $nome = $this->faker->name('female');
            $idade = $this->faker->numberBetween(16, 40);

            file_put_contents('idades.csv', "$nome;$idade" . PHP_EOL, FILE_APPEND);
        }

        $output->writeln(PHP_EOL . posix_getpid() . ' Finalizado');
    }
}
