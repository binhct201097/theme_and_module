<?php

namespace AHT\Blog\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $date;
	public function __construct(\Magento\Framework\Stdlib\DateTime\DateTime $date)
	{
		$this->date = $date;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '1.0.2', '<')) {
			$datas = [
                [
				'name'         => "Magento 2 Events",
				'url_key'      => '/magento-2-module-development/magento-2-events.html',
				'image'        => 'image1.jpg',
                'content'      => 'magento 2',
                'status'       => 1,
                'created_at'   => $this->date->date(),
                'updated_at'   => $this->date->date(),
                ],
                [
                    'name'         => "Magento 2 Events",
                    'url_key'      => '/magento-2-module-development/magento-2-events.html',
                    'image'        => 'image1.jpg',
                    'content'      => 'magento 2',
                    'status'       => 1,
                    'created_at'   => $this->date->date(),
                    'updated_at'   => $this->date->date(),
                ]
            ];
                
			foreach($datas as $data) {
                $setup->getConnection()->insert($setup->getTable('aht_blog_post'), $data);
            }
		}
	}
}