<?php
namespace Hadu\Product\Model\ResourceModel;

class Product extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	public function _construct()
	{
		$this->_init("hadu_product", "product_id");
	}
}