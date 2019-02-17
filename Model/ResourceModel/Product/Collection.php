<?php
namespace Hadu\Product\Model\ResourceModel\Product;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	public function _construct()
	{
		$this->_init("Hadu\Product\Model\Product", "Hadu\Product\Model\ResourceModel\Product");

	}
}
