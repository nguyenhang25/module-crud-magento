<?php
namespace Hadu\Product\Block;
class CallEditForm extends \Magento\Framework\View\Element\Template
{
	protected $_coreRegistry;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Framework\Registry $coreRegistry)
	{
		$this->_coreRegistry = $coreRegistry;
		parent::__construct($context);
	}

	public function getInforProduct(){
		$data = $this->_coreRegistry->registry('product');
		return $data;
	}

	
	
}
