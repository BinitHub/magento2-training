<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */
namespace Training\Seller\Controller\Adminhtml\Seller;

/**
 * Admin Action : seller/index
 *
 * @author    Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class Index extends AbstractAction
{
    /**
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();

        // get the list of the sellers
        $list = $this->sellerRepository->getList($searchCriteria);

        $model = $this->modelFactory->create();
        $model->getResource()->load($model, 1);
        echo '<pre>';
        print_r($list->getTotalCount());
        echo '<br>';
        print_r($model->getData());
        echo '</pre>';
    }
}