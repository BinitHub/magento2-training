<?php
namespace Training\Custom\Controller\Index;

use \Magento\Customer\Model\Customer;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    protected $customer;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        Customer $customer,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->customer = $customer;
        parent::__construct($context);
    }
    
    public function execute()
    {
        $data = '';
        foreach ($this->getCollection() as $customer) {
            $data.= $customer->getEmail() .'<br>';
        }
        return $this->getResponse()->appendBody($data);
    }

    public function getCollection()
    {
        //Get customer collection
        return $this->customer->getCollection();
    }

    public function getCustomer($customerId)
    {
        //Get customer by customerID

        $id = $this->customer->load($customerId);
        if ($id !== null && $id instanceof \Magento\Customer\Model\Customer) {
            return $id;
        }
    }
}
