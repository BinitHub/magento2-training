<?php
namespace Training\Caudalie\Model;
class Easiware extends \Magento\Framework\Model\AbstractModel implements \Training\Caudalie\Api\Data\EasiwareInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'training_caudalie_easiware';

    protected function _construct()
    {
        $this->_init('Training\Caudalie\Model\ResourceModel\Easiware');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
