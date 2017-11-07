<?php
namespace Training\Caudalie\Api;

use Training\Caudalie\Api\Data\EasiwareInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SearchCriteriaInterface;

interface EasiwareRepositoryInterface 
{
    public function save(EasiwareInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(EasiwareInterface $page);

    public function deleteById($id);
}
