<?php
namespace Hadu\Product\Controller\Index;

class Add extends \Magento\Framework\App\Action\Action
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
        if ($_POST) {
            $name = $this->getRequest()->getParam("name");
            $price = $this->getRequest()->getParam("price");
            $quality = $this->getRequest()->getParam("quality");

            $model = $this->_productFactory->create();
            $model->addData([
                "name" => $name,
                "price" => $price,
                "quality" => $quality
            ])->save();
            $this->messageManager->addSuccess(__('congratulation'));

            return $this->_redirect('product/index/index');

        }
        
        return $this->_redirect('product/index/index');
    }
}
