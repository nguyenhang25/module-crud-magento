<?php
namespace Hadu\Product\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) 
	{
		$installer = $setup;
		$installer->startSetup();
		if(version_compare($context->getVersion(), '1.0.1', '<')) {
			if (!$installer->tableExists('hadu_product')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('hadu_product')
				)->addColumn(
					'product_id',
					Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary' => true,
						'unsigned' => true,
					],
					'Product ID'
				)->addColumn(
					'name',
					Table::TYPE_TEXT,
					255,
					[
						'nullable' => false
					],
					'Name'
				)->addColumn(
					'price',
					Table::TYPE_INTEGER,
					null,
					[
						'nullable' => false
					],
					'Price'
				)->addColumn(
					'quality',
					Table::TYPE_INTEGER,
					null,
					[
						'nullable' => false
					],
					'Quality'
				)->addColumn(
					'created_at',
					Table::TYPE_TIMESTAMP,
					null,
					[
						'nullable' => false,
						'default' => Table::TIMESTAMP_INIT
					],
					'Created At'
				)->addColumn(
					'updated_at',
					Table::TYPE_TIMESTAMP,
					null,
					[
						'nullable' => false,
						'default' => Table::TIMESTAMP_INIT_UPDATE
					],
					'Updated At'
				)->setComment('Product Table');

				$installer->getConnection()->createTable($table);
				$installer->getConnection()->addIndex(
					$installer->getTable('hadu_product'),
					$setup->getIdxName(
						$installer->getTable('hadu_product'),
						['name', 'price', 'quality'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					),
					['name', 'price', 'quality'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				);
			} else {
				$setup->run("ALTER TABLE ".$installer->getTable('hadu_product')." ADD COLUMN status BOOLEAN");
			}

		}
		$installer->endSetup();
	}

}