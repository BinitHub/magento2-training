<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 11/7/17
 * Time: 10:36 AM
 */
namespace Training\Helloworld\Controller\Product;

/**
 * Action: Product/Index
 *
 * @author
Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class Category extends \Magento\Framework\App\Action\Action
{
    public $productCollection;

    public $categoryCollection;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollection,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection
    ) {
        parent::__construct($context);
        $this->productCollection = $productCollection;
        $this->categoryCollection = $categoryCollection;
    }

    /**
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        $productCollection = $this->productCollection->create();
        $productCollection
            ->addAttributeToFilter('name', ['like' => '%bag%'])
            ->addCategoryIds()
            ->addAttributeToSelect('name')
            ->load();

        $categoryIds = [];
        foreach ($productCollection->getItems() as $product) {
            // ajoute à l'array les nouvelles valeurs à chaque itération
            $categoryIds = array_merge($categoryIds, $product->getCategoryIds());
        }
        // supprime les doublons
        $categoryIds = array_unique($categoryIds);

        $categoryCollection = $this->categoryCollection->create();
        $categoryCollection
            ->addAttributeToFilter('entity_id', ['in' => $categoryIds])
            ->addAttributeToSelect('name');

        $toHtml = '<ul>';
        foreach ($productCollection->getItems() as $product) {
            $toHtml.= '<li>';
            $toHtml.= $product->getId(). ' // ' . $product->getSku() . ' // ' .$product->getName();
            $toHtml.= '<ul>';
            foreach ($product->getCategoryIds() as $categoryId) {
                $category = $categoryCollection->getItemById($categoryId);
                $toHtml.= '<li>' . $categoryId . ' => ' . $category->getName() . '</li>';
            }
            $toHtml.= '</ul>';
        }
        $toHtml.= '</ul>';

        $this->getResponse()->appendBody($toHtml);



    }

}