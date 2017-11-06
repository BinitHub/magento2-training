<?php
/**
 * Magento 2 Training Project
 * Module Training/Helloworld
 */
namespace Training\Helloworld\Observer;
use Magento\Framework\Event\ObserverInterface;
/**
 * Observer PredispatchLogUrl
 *
 * @author
Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class PredispatchLogUrl implements ObserverInterface
{

    public $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $log
    )
    {
        $this->logger = $log;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $pathInfo = $observer->getEvent()->getRequest()->getPathInfo();
        $this->logger->debug('Current url is : ' . $pathInfo);
    }

}