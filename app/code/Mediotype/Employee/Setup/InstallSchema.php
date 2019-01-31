<?php
/**
 * @author    Mediotype Development <diveinto@mediotype.com>
 * @copyright 2018 Mediotype. All Rights Reserved.
 */

namespace Mediotype\Employee\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context): void
    {
        $installer = $setup;
        $installer->startSetup();

        /**
        * Create table 'mediotype_employee'
        */
        $table = $setup->getConnection()
            ->newTable($setup->getTable('mediotype_employee'))
            ->addColumn(
                'employee_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Employee ID'
            )
            ->addColumn(
                'email',
                Table::TYPE_TEXT,
                255,
                [],
                'Email'
            )
            ->addColumn(
                'firstname',
                Table::TYPE_TEXT,
                255,
                [],
                'First Name'
            )
            ->addColumn(
                'lastname',
                Table::TYPE_TEXT,
                255,
                [],
                'Last Name'
            )
            ->addColumn(
                'position',
                Table::TYPE_INTEGER,
                11,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'Position'
            )
            ->addColumn(
                'hire_date',
                Table::TYPE_DATETIME,
                null,
                ['nullable' => true, 'default' => null],
                'Hire Date'
            )
            ->addColumn(
                'termination_date',
                Table::TYPE_DATETIME,
                null,
                ['nullable' => true, 'default' => null],
                'Termination Date'
            )
            ->addColumn(
                'picture',
                Table::TYPE_TEXT,
                255,
                [],
                'Picture'
            )
            ->addColumn(
                'certifications',
                Table::TYPE_TEXT,
                255,
                [],
                'Certifications'
            )
            ->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                255,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                255,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
        'Updated At'
            )
            ->addIndex(
                $installer->getIdxName(
                    'mediotype_employee',
                    ['email'],
                    AdapterInterface::INDEX_TYPE_UNIQUE
                ),
                ['email'],
                ['type' => AdapterInterface::INDEX_TYPE_UNIQUE]
            )->setComment("Employee Table");

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
