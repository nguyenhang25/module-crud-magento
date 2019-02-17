<?php
namespace Hadu\Product\Setup;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		if ($context->getVersion() && version_compare($context->getVersion(), '1.0.1') < 0) {
			$table = $setup->getTable('hadu_product');
			$setup->getConnection()->insert(
				$table,
				[
					'name' => 'Iphone 7',
					'price' => '900000',
					'quality' => 50
				]
			);
			$setup->getConnection()->insert(
				$table,
				[
					'name' => 'Iphone X',
					'price' => '950000',
					'quality' => 50
				]
			);
			$setup->getConnection()->insert(
				$table,
				[
					'name' => 'SamSung S8',
					'price' => '900000',
					'quality' => 50
				]
			);
		}
		$setup->endSetup();
	}
}