<?php
namespace Training\Caudalie\Model\ResourceModel;
class Easiware extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('training_caudalie_easiware','training_caudalie_easiware_id');
    }
}
