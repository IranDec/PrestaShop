<?php
/**
 * 2007-2020 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

declare(strict_types=1);

namespace PrestaShop\PrestaShop\Core\Domain\Product\Customization\Field;

use PrestaShop\PrestaShop\Core\Domain\Product\Customization\Field\ValueObject\CustomizationFieldId;
use PrestaShop\PrestaShop\Core\Domain\Product\Customization\ValueObject\CustomizationType;

/**
 * Transfers customization field data
 */
class CustomizationField
{
    /**
     * @var int
     */
    private $type;

    /**
     * @var string[]
     */
    private $localizedNames;

    /**
     * @var bool
     */
    private $required;

    /**
     * @var int|null
     */
    private $customizationFieldId;

    /**
     * @var bool
     */
    private $addedByModule;

    /**
     * @param int $type
     * @param string[] $localizedNames
     * @param bool $required
     * @param int|null $customizationFieldId
     * @param bool $addedByModule
     */
    public function __construct(
        int $type,
        array $localizedNames,
        bool $required,
        ?int $customizationFieldId = null,
        bool $addedByModule = false
    ) {
        $this->type = $type;
        $this->localizedNames = $localizedNames;
        $this->required = $required;
        $this->customizationFieldId = $customizationFieldId ? $customizationFieldId : null;
        $this->addedByModule = $addedByModule;
    }

    /**
     * @return int|null
     */
    public function getCustomizationFieldId(): ?int
    {
        return $this->customizationFieldId;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return string[]
     */
    public function getLocalizedNames(): array
    {
        return $this->localizedNames;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @return bool
     */
    public function isAddedByModule(): bool
    {
        return $this->addedByModule;
    }
}
