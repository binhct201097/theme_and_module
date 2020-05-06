<?php
namespace BM\Test\Block;
class Test extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    )
	{
		parent::__construct($context);
	}

	public function getBlogInfo()
	{
		return __('Test ne <3');
	}
	public function getPosts()
	{
		$collection = $this->postRepository->getList();
		// $collection = $post->getCollection();
		return $collection;
	}

}