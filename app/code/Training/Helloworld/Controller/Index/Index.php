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
namespace Training\Helloworld\Controller\Index;
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
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        $this->getResponse()->appendBody('Hello World !');
    }
}