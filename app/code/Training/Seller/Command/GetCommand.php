<?php
namespace Training\Seller\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Training\Seller\Api\SellerRepositoryInterface;

class GetCommand extends Command
{
    protected $sellerRepository;

    public function __construct(SellerRepositoryInterface $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
        parent::__construct();
    }


    protected function configure()
    {
        $options = [
            new InputOption(
                'id',
                null,
                InputOption::VALUE_REQUIRED,
                'Run only if id is specified'
            ),
        ];
        $this->setName("training:seller:get");
        $this->setDescription("Require id");
        $this->setDefinition($options);
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getOption('id');
        $seller = $this->sellerRepository->getById($id);
        $output->writeln($seller->getData());
    }
} 