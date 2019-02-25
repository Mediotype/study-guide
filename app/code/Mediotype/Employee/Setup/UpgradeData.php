<?php
/**
 * @author    Mediotype Development <diveinto@mediotype.com>
 * @copyright 2019 Mediotype. All Rights Reserved.
 */

namespace Mediotype\Employee\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Upgrade data is used for updating data based on your modules version. Using the version_compare function
 * we can determine if/when certain changes to the modules data should occur. In this example we are going to
 * look specifically for our original Joel Hart record from the installation script and update it to have a
 * value in the newly added gender column.
 *
 * Class UpgradeData
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = 'mediotype_employee';

        /**
         * Here we check if our module is of version 0.0.2 then update our Joel Hart record. If the version
         * of our module is less than 0.0.2 version_compare will return a boolean and we will know that we need to
         * run the following updates.
         */
        if (version_compare($context->getVersion(), '0.0.2', '<')) {
            $this->updateGender($setup, $tableName);
        }
    }

    /**
     * Updates our record with the correct gender.
     *
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $setup
     * @param string $tableName
     */
    private function updateGender($setup, $tableName)
    {
        /**
         * Check if our row exists in the database.
         */
        if ($setup->getTableRow($setup->getTable($tableName), 'employee_id', 1)) {
            /**
             * We've confirmed that the row exists in the database, now lets update our users gender to be 1 (male).
             */
            $setup->updateTableRow(
                $setup->getTable($tableName),
                'employee_id',
                '1',
                'gender',
                '1'
            );
        }
    }
}
