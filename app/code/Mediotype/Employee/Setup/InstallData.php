<?php
/**
 * @author    Mediotype Development <diveinto@mediotype.com>
 * @copyright 2018 Mediotype. All Rights Reserved.
 */

namespace Mediotype\Employee\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Install employees
         */
        $data = [
            [
                'email' => 'joel@mediotype.com',
                'firstname' => 'Joel',
                'lastname' => 'Hart',
                'position' => '0',
                'hire_date' => '',
                'termination_date' => '',
                'picture' => '',
                'certifications' => '',
            ]
        ];

        foreach ($data as $bind) {
            $setup->getConnection()->insertForce($setup->getTable('mediotype_employee'), $bind);
        }
    }
}