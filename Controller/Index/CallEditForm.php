<?php
namespace Hadu\Product\Controller\Index;

class CallEditForm extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_productFactory;
    protected $_coreRegistry;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Hadu\Product\Model\ProductFactory $productFactory,
        \Magento\Framework\Registry $coreRegistry)
    {
        $this->_pageFactory = $pageFactory;
        $this->_productFactory = $productFactory;
        $this->_coreRegistry = $coreRegistry;
        return parent::__construct($context);
    }

    public function execute()
    {
        $idProduct = $this->getRequest()->getParam("id");
        $model = $this->_productFactory->create();
        $data = $model->load($idProduct)->getData();

        $this->_coreRegistry->register('product', $data);
        return $this->_pageFactory->create();      
    }
}
