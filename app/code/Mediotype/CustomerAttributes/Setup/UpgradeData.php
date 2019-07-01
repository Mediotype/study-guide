<?php
/**
 * @author    Mediotype Development <diveinto@mediotype.com>
 * @copyright 2019 Mediotype. All Rights Reserved.
 */

namespace Mediotype\CustomerAttributes\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var CustomerSetupFactory
     */
    protected $customerSetupFactory;

    /**
     * @var AttributeSetFactory
     */
    private $attributeSetFactory;

    /**
     * InstallData constructor.
     * @param EavSetupFactory $eavSetupFactory
     * @param Config $config
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        Config $config
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->config = $config;
    }


    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $attributeCode = 'is_eddie_murphy';

        $eavSetup->addAttribute(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            $attributeCode,
            [
                'type' => 'int',
                'label' => 'Is Eddie Murphy',
                'input' => 'boolean',
                'backend' => \Magento\Customer\Model\Attribute\Backend\Data\Boolean::class,
                'required' => true,
                'user_defined' => true,
                'system' => 0,
                'position' => 120,
            ]
        );

        $eavSetup->addAttributeToSet(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            CustomerMetadataInterface::ATTRIBUTE_SET_ID_CUSTOMER,
            null,
            $attributeCode
        );

        $attribute = $this->config->getAttribute(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            $attributeCode
        );

        $attribute->setData(
            'used_in_forms',
            [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]
        );

        $attribute->getResource()->save($attribute);

        $setup->endSetup();
    }
}
