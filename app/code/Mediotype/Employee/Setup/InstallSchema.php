<?php
/**
 * @author    Mediotype Development <diveinto@mediotype.com>
 * @copyright 2019 Mediotype. All Rights Reserved.
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
     * Installation Schema is used for adding tables, columns, indexers, etc to your database.
     * When attempting to connect to Magento's database you need to be sure to add SchemaSetupInterface and
     * ModuleContextInterface as arguments to your install method.
     *
     * The SchemaSetupInterface allows you the ability to connect to the database and run functions such as
     * getTable(), newTable(), addColumn() etc.
     *
     * The ModuleContextInterface which is not typically used in the installation of a module is used for version
     * control of your module and determining when a part of your script should run.
     *
     * In our example below we have we get a connection to the database using the SchemaSetupInterface and connect
     * to it by calling the getConnect() method. By getting a connection object we now have access to its methods
     * such as newTable(). Inside of newTable() we pass in the argument 'mediotype_employees' which will be the name
     * of our custom table and we start adding columns to it.
     *
     * In order to add columns to a table you need to make sure you supply it with the correct arguments. The
     * addColumn() method accepts name, type, size, arguments and comment parameters.
     *
     * Name: The name of the column you want defined in your table.
     *
     * Type: The type that the column should be assigned to hold the correct type of data. This could be a blob,
     * decimal, varhar, etc.
     *
     * Size: Depending on the type of column you're trying to add it may be wise to include a size. If you are adding
     * an Integer to the database you might know how big that field should be. On the other hand you might not want
     * to set a limit on something like a Boolean type, in which case we leave the value as null.
     *
     * Arguments: These can be any number of things that affect your column such as primary, nullable, unsigned, etc.
     * These arguments help you define if your column is the primary key, an unsigned integer or a field that can
     * be null.
     *
     * Comment: Self explanatory, it allows you to add a comment to the column in the database.
     *
     * Finally after all of this we call our SchemaSetupInterface object again and call createTable() to start the
     * sequence of actually creating the table after setting all of this data on the object.
     *
     * To end our session we call endSetup() which set our sql mode and foreign key checks.
     *
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
