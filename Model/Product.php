<?php
namespace Hadu\Product\Model;

class Product extends \Magento\Framework\Model\AbstractModel 
{
	public function _construct()
	{
		$this->_init("Hadu\Product\Model\ResourceModel\Product");
	}
}