<?php
namespace Training\Seller\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Training\Seller\Model\SellerFactory;
use Training\Seller\Model\Seller;

class InstallData implements InstallDataInterface
{

    public $sellerFactory;

    public function __construct(
        SellerFactory $sellerFactory
    )
    {
        $this->sellerFactory = $sellerFactory;
    }

    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        /** @var Seller $model */
        $model = $this->sellerFactory->create();
        $model->setIdentifier('main')->setName('Main Seller');
        $model->getResource()->save($model);
    }

}
