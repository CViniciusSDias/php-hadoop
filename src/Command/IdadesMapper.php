<?php
namespace CViniciusSDias\PHPHadoop\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IdadesMapper extends Command
{
    protected function configure()
    {
        $this
            ->setName('mapper')
            ->setDescription('Mapeia as idades do arquivo')
            ->setProcessTitle('php-hadoop-mapper');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while ($linha = fgetcsv(STDIN, 0, ';')) {
            $idade = $linha[1];
            $output->writeln("$idade\t1");
        }
    }
}
