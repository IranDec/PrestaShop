<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
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
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace LegacyTests\Integration\classes;

use Currency;
use LegacyTests\PrestaShopBundle\Utils\DatabaseCreator as Database;
use LegacyTests\TestCase\IntegrationTestCase;

class CurrencyTest extends IntegrationTestCase
{
    protected function setUp()
    {
        parent::setUp();

        Database::restoreTestDB();
    }

    public function testGetIdByIsoCodeWithCache()
    {
        $this->assertEquals(0, Currency::getIdByIsoCode('ZZZ', 0, false));
        $this->addDummyCurrency();
        $idByIsoCode = Currency::getIdByIsoCode('ZZZ', 0, false);
        $this->assertNotEquals(0, $idByIsoCode);
        $this->assertIsInt($idByIsoCode);
    }

    public function testGetIdByIsoCodeWithoutCache()
    {
        $this->assertEquals(0, Currency::getIdByIsoCode('ZZZ', 0, true));
        $this->addDummyCurrency();
        $idByIsoCode = Currency::getIdByIsoCode('ZZZ', 0, true);
        $this->assertNotEquals(0, $idByIsoCode);
        $this->assertIsInt($idByIsoCode);
    }

    protected function addDummyCurrency()
    {
        $currency = new Currency();
        $currency->name = 'ZZZ';
        $currency->precision = 2;
        $currency->iso_code = 'ZZZ';
        $currency->active = 1;
        $currency->conversion_rate = 1.00;
        $currency->add();
    }
}
