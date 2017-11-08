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
use Training\Seller\Api\SellerRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
/**
 * Action: Index/Index
 *
 * @author
Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class View extends \Magento\Framework\App\Action\Action
{
    /**
     * @var SellerRepositoryInterface
     */
    protected $sellerRepository;

    public function __construct(
        Context                   $context,
        SellerRepositoryInterface $sellerRepository
    ) {
        $this->sellerRepository      = $sellerRepository;

        parent::__construct($context);
    }
    /**
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        // get the asked identifier
        $identifier = trim($this->getRequest()->getParam('identifier'));
        if (!$identifier) {
            $this->_forward('noroute');
            return null;
        }

        // get the asked seller
        try {
            $seller = $this->sellerRepository->getByIdentifier($identifier);
        } catch (NoSuchEntityException $e) {
            $this->_forward('noroute');
            return null;
        }

        echo '<h1>'.$seller->getName().'</h1>';
        echo '<hr />';
        echo '<p>#'.$seller->getIdentifier().'</p>';
        echo '<hr />';
        echo '<a href="/sellers.html">back to the list</a>';
    }
}