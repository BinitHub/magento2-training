<?php
namespace Training\Caudalie\Model\ResourceModel\Easiware;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Training\Caudalie\Model\Easiware','Training\Caudalie\Model\ResourceModel\Easiware');
    }
}
