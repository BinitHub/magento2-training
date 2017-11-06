<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 11/6/17
 * Time: 5:42 PM
 */
/**
 * Magento 2 Training Project
 * Module Training/Helloworld
 */
namespace Training\Helloworld\Rewrite\Model;
/**
 * Rewrite \Magento\Catalog\Model\Product
 *
 * @author
Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class Product extends \Magento\Catalog\Model\Product
{
    /**
     * Get the name of the product
     *
     * @return string
     */
    public function getName()
    {
        return parent::getName() . ' (This is a rewrite of native method getName)';
    }
}
