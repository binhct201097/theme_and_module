<?php
namespace Packt\Promo\Controller\Model;

class Getlist extends \Magento\Framework\App\Action\Action
{
    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Packt\Promo\Model\PostFactory $postFactory
    ) {
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        // return $this->_pageFactory->create();

        $post = $this->_postFactory->create();
        // $post->addAttributeToSelect('*');
        // $post->setPageSize(3); // fetching only 3 products

        $collection = $post->getCollection()->addFieldToFilter('type_id', ['like' => '%downloadable%']);

        echo "<pre>";
        print_r($collection->getData());
        echo "</pre>";
    }
}
