<?php
namespace Hadu\Product\Block;
class Index extends \Magento\Framework\View\Element\Template
{
	protected $_productFactory;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Hadu\Product\Model\ProductFactory $productFactory)
	{
		$this->_productFactory = $productFactory;
		parent::__construct($context);
	}

	public function getProduct()
	{
		$model = $this->_productFactory->create();
		$data = $model->getCollection()->getData();
		return $data;
	}
	
}
