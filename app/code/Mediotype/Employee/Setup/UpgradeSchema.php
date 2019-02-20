<?php
/**
 * @author    Mediotype Development <diveinto@mediotype.com>
 * @copyright 2019 Mediotype. All Rights Reserved.
 */

namespace Mediotype\Employee\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * The UpgradeSchema class is used for updating, removing, adding columns, tables, indexers, etc in the database
 * based on the version of the module. In the example below we can see that we are performing 2 operations.
 *
 * 1. We are checking the module version, when we are on a specific version of a module we only want to run the
 * latest updates to prevent data corruption. E.G: Upgrading from 0.0.1 -> 0.0.2 we would not want to install the
 * mediotype_employee table twice and potentially lose all of our added data.
 *
 * 2. Adding a column to our already existing table using the SchemaSetupInterface called "gender" to give
 * our employees a gender.
 *
 * Class UpgradeSchema
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = 'mediotype_employee';

        /**
         * Here we check if our module is of version 0.0.2 then update mediotype_employee table to include a
         * gender column of type smallint. If the version is not of 0.0.2 then the function will return -1 which will result in our code not running.
         */
        if (version_compare($context->getVersion(), '0.0.2', '<')) {
            $this->addGenderColumn($setup, $tableName);
        }

        $setup->endSetup();
    }

    /**
     * Adds the gender column to the mediotype_employee table.
     *
     * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
     * @param $tableName
     */
    private function addGenderColumn($setup, $tableName)
    {
        $setup->getConnection()->addColumn(
            $setup->getTable($tableName),
            'gender',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                'unsigned' => true,
                'nullable' => true,
                'default' => NULL,
                'comment' => 'Gender'
            ]
        );
    }
}
