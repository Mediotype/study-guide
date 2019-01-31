<?php
/**
* Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/

namespace Mediotype\Employee\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
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
                  'middlename',
                  Table::TYPE_TEXT,
                  255,
                  [],
                  'Middle Name'
              )
              ->addColumn(
                  'lastname',
                  Table::TYPE_TEXT,
                  255,
                  [],
                    'Sections'
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
              )->setComment("Employee Table");

          $setup->getConnection()->createTable($table);
      }
}
