<?php
namespace Training\Seller\Model\ResourceModel\Seller;

use Training\Seller\Api\Data\SellerInterface;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Training\Seller\Model\Seller','Training\Seller\Model\ResourceModel\Seller');
    }

    /**
     * Returns pairs id - name
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->_toOptionArray(SellerInterface::FIELD_SELLER_ID, SellerInterface::FIELD_NAME);
    }
}
