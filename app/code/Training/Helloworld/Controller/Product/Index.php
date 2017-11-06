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
namespace Training\Helloworld\Controller\Product;

/**
 * Action: Product/Index
 *
 * @author
Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class Index extends \Magento\Framework\App\Action\Action
{
    public $productFactory;

    public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Catalog\Model\ProductFactory $productFactory
    ) {
        parent::__construct($context);
        $this->productFactory = $productFactory;
    }

    protected function getAskedProduct()
    {
        // get the asked id
        $id = (int) $this->getRequest()->getParam('id');
        if (!$id) {
            return null;
        }
        // get the product
        $product = $this->productFactory->create()->load($id);
        if (!$product->getId()) {
            return null;
        }
        return $product;
    }

    /**
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        $product = $this->getAskedProduct();
        if (!$product && !$product->getId()) {
            $this->_forward('noroute');
            return;
        }
        $this->getResponse()->appendBody('Product name: '. $product->getName() . '<br> Product price: ' .$product->getPrice());
    }
}