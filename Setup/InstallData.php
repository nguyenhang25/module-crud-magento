<?php
namespace Hadu\Product\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		$setup->getConnection()->insert(
			$setup->getTable('hadu_product'),
			[
				'name' => 'Iphone 7',
				'price' => '9000000',
				'quality' => 50
			]
		);
		$setup->getConnection()->insert(
			$setup->getTable('hadu_product'),
			[
				'name' => 'Iphone X',
				'price' => '2000000',
				'quality' => 50
			]
		);
		$setup->getConnection()->insert(
			$setup->getTable('hadu_product'),
			[
				'name' => 'SamSung S8',
				'price' => '9000000',
				'quality' => 50
			]
		);
		$setup->endSetup();
	}
}
