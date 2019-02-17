<?php
namespace Hadu\Product\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) 
	{
		$installer = $setup;
		$installer->startSetup();
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
				Table::TYPE_TEXT,
				255,
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
					['name', 'price'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name', 'price'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}