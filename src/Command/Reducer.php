<?php
namespace CViniciusSDias\PHPHadoop\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Reducer extends Command
{
    protected function configure()
    {
        $this
            ->setName('reducer')
            ->setDescription('Conta quantas pessoas são menores de idade')
            ->setProcessTitle('php-hadoop-reducer');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $count = 0;
        while ($linha = fgetcsv(STDIN, 0, "\t")) {
            $idade = $linha[0];
            $count = $idade < 18 ? $count + 1 : $count;
        }
        $output->writeln("Menores\t$count");
    }
}
