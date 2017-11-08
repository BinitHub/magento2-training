<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 11/6/17
 * Time: 2:43 PM
 */
/**
 * Magento 2 Training Project
 * Module Training/Helloworld
 */
namespace Training\Seller\Controller\Seller;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Training\Seller\Api\SellerRepositoryInterface;
/**
 * Action: Index/Index
 *
 * @author
Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var SellerRepositoryInterface
     */
    protected $sellerRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * PHP Constructor
     *
     * @param Context                   $context
     * @param SellerRepositoryInterface $sellerRepository
     * @param SearchCriteriaBuilder     $searchCriteriaBuilder
     */
    public function __construct(
        Context                   $context,
        SellerRepositoryInterface $sellerRepository,
        SearchCriteriaBuilder     $searchCriteriaBuilder
    ) {
        $this->sellerRepository      = $sellerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

        parent::__construct($context);
    }

    /**
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        $searchCriteria = $this->getSearchCriteria();

        // get the list of the sellers
        $result = $this->sellerRepository->getList($searchCriteria);

        // display the result
        echo '<ul>';
        foreach ($result->getItems() as $seller) {
            echo '<li><a href="/seller/'.$seller->getIdentifier().'.html">'.$seller->getName().'</a></li>';
        }
        echo '</ul>';
    }

    /**
     * Get the search criteria
     *
     * @return \Magento\Framework\Api\SearchCriteria
     */
    protected function getSearchCriteria()
    {
        // build the criteria
        return $this->searchCriteriaBuilder->create();
    }
}