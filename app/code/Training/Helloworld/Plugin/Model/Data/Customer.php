<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 11/6/17
 * Time: 5:22 PM
 */
namespace Training\Helloworld\Plugin\Model\Data;

class Customer
{
    public function beforeSetFirstname(\Magento\Customer\Model\Data\Customer $subject, $value)
    {
        $value = mb_convert_case($value, MB_CASE_TITLE);
        return [$value];
    }

    public function beforeSetLastname(\Magento\Customer\Model\Data\Customer $subject, $value)
    {
        $value = mb_convert_case($value, MB_CASE_TITLE);
        return [$value];
    }

}