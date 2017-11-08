<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */
namespace Training\Seller\Controller\Adminhtml\Seller;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Training\Seller\Model\SellerFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Training\Seller\Api\SellerRepositoryInterface;

/**
 * Abstract Admin action for seller
 *
 * @author    Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
abstract class AbstractAction extends Action
{
    /**
     * Model Factory
     *
     * @var \Training\Seller\Model\SellerFactory
     */
    protected $modelFactory;

    protected $searchCriteriaBuilder;

    protected $sellerRepository;

    /**
     * PHP Constructor
     *
     * @param \Magento\Backend\App\Action\Context          $context
     * @param \Training\Seller\Model\SellerFactory         $modelFactory
     */
    public function __construct(
        Context $context,
        SellerFactory $modelFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SellerRepositoryInterface $sellerRepository
    ) {
        $this->sellerRepository      = $sellerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->modelFactory        = $modelFactory;

        parent::__construct($context);
    }

    /**
     * Is it allowed ?
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Seller::manage');
    }
}
