<?php
namespace Hadu\Product\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_productFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Hadu\Product\Model\ProductFactory $productFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_productFactory = $productFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $idProduct = $this->getRequest()->getParam("id");
        $model = $this->_productFactory->create();
        $model->load($idProduct)->delete();
        $this->messageManager->addSuccess(__('congratulation'));
        
        return $this->_redirect('product/index/index');
    }
}
