<?php
namespace SamKnows\CountriesBundle\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FetchCountriesCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('countries:fetch')
            ->setDescription('Fetch and store countries from remote');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fetcher = $this->getContainer()->get('sam_knows_countries.fetcher.country_fetcher');

        $fetcher->fetch();
    }
}
