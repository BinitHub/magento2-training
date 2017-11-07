<?php
namespace Training\Seller\Model\ResourceModel;
class Seller extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('training_seller','seller_id');
    }
}
