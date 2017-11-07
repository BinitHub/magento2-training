<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 11/7/17
 * Time: 11:23 AM
 */

namespace Training\Helloworld\Controller\Product;
/**
 * Action: Index/Index
 *
 * @author
Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class Search extends \Magento\Framework\App\Action\Action
{

    protected $productRepository;

    protected $searchCriteriaBuilder;

    protected $filterBuilder;

    protected $sortOrderBuilder;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
    )
    {
        parent::__construct($context);
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    public function getProductFilter()
    {
        $filterDesc[] = $this->filterBuilder
            ->setField('description')
            ->setConditionType('like')
            ->setValue('%comfortable%')
            ->create();
        $filterName[] = $this->filterBuilder
            ->setField('name')
            ->setConditionType('like')
            ->setValue('%bruno%')
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilters($filterDesc)
            ->addFilters($filterName)
            ->create();

        return $this->productRepository->getList($searchCriteria)->getItems();
    }

    /**
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        $products = $this->getProductFilter();
        foreach ($products as $product) {
            $this->outputProduct($product);
        }
    }

    protected function outputProduct(\Magento\Catalog\Api\Data\ProductInterface $product)
    {
        $this->getResponse()->appendBody(
            $product->getSku().' => '.$product->getName().'<br>'.$product->getDescription() . '<br />'
        );
    }
}