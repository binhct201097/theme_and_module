<?php
namespace Packt\Promo\Block;

/**
 * Promo block
 */
class Promo extends \Magento\Framework\View\Element\Template
{
    protected $context;
    protected $_categoryFactory;
    protected $storeManager;
    protected $_postFactory;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Packt\Promo\Model\PostFactory $postFactory,
        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        $this->_categoryFactory = $categoryFactory;
        $this->_postFactory = $postFactory;
        parent::__construct($context, $data);
    }

    public function getImage()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection()->addFieldToFilter('type_id', ['like' => '%downloadable%']);
        return $collection;
    }

    public function getCategory($categoryId)
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return $category;
    }
    public function getCategoryProducts($categoryId)
    {
        $products = $this->getCategory($categoryId)->getProductCollection();
        $products->addAttributeToSelect('small_image');
        return $products;
    }
    public function getProductUrlImage()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . "catalog/product";
    }
    public function getTitle()
    {
        return "My Promotions Block";
    }
}
