<?php

declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PlatformDemoData\Resources\helper;

use Doctrine\DBAL\Connection;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Uuid\Uuid;

#[Package('services-settings')]
class DbHelper
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getLanguageId(string $languageCode): ?string
    {
        $localeId = $this->getLocaleId($languageCode);

        if ($localeId === null) {
            return null;
        }

        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM language
                WHERE locale_id = UNHEX(:localeId)
            ',
            ['localeId' => $localeId]
        );

        if ($result === false) {
            return null;
        }

        return $result;
    }

    public function getSystemLanguageCode(): string
    {
        $systemLanguageLocaleId = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(locale_id))
                FROM language
                WHERE id = UNHEX(:systemLanguageId)
            ',
            ['systemLanguageId' => Defaults::LANGUAGE_SYSTEM]
        );

        if ($systemLanguageLocaleId === false) {
            throw new \RuntimeException('Could not find the localeID of the SystemLanguage!');
        }

        $systemLanguageCode = $this->connection->fetchOne(
            '
                SELECT code
                FROM locale
                WHERE id = UNHEX(:systemLanguageLocaleId)
            ',
            ['systemLanguageLocaleId' => $systemLanguageLocaleId]
        );

        if ($systemLanguageCode === false) {
            throw new \RuntimeException('The locale of the SystemLanguage could not be found');
        }

        return $systemLanguageCode;
    }

    public function getSalutationId(): string
    {
        $result = $this->connection->fetchOne('
            SELECT LOWER(HEX(COALESCE(
	            (SELECT `id` FROM `salutation` WHERE `salutation_key` = "mr" LIMIT 1),
	            (SELECT `id` FROM `salutation` LIMIT 1)
            )))
        ');

        if (!$result) {
            throw new \RuntimeException('No salutation found, please make sure that basic data is available by running the migrations.');
        }

        return (string) $result;
    }

    public function getStorefrontSalesChannel(): string
    {
        $result = $this->connection->fetchOne('
            SELECT LOWER(HEX(`id`))
            FROM `sales_channel`
            WHERE `type_id` = :storefront_type
        ', ['storefront_type' => Uuid::fromHexToBytes(Defaults::SALES_CHANNEL_TYPE_STOREFRONT)]);

        if (!$result) {
            throw new \RuntimeException('No tax found, please make sure that basic data is available by running the migrations.');
        }

        return (string) $result;
    }

    public function getTaxId(): string
    {
        $result = $this->connection->fetchOne('
            SELECT LOWER(HEX(COALESCE(
                (SELECT `id` FROM `tax` WHERE tax_rate = "0.00" LIMIT 1),
	            (SELECT `id` FROM `tax`  LIMIT 1)
            )))
        ');

        if (!$result) {
            throw new \RuntimeException('No tax found, please make sure that basic data is available by running the migrations.');
        }

        return (string) $result;
    }

    public function getCountryId(string $iso = 'CN'): ?string
    {
        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM country
                WHERE iso = :iso
            ',
            ['iso' => $iso]
        );

        if ($result === false) {
            return null;
        }

        return (string) $result;
    }

    public function getCountryStateId(string $iso = 'CN'): ?string
    {
        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM country
                WHERE iso = :iso
            ',
            ['iso' => $iso]
        );

        if ($result === false) {
            return null;
        }
        $countryId = (string) $result;

        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM country_state
                WHERE country_id = :countryId and short_code=:shortCode LIMIT 1
            ',
            ['countryId' => Uuid::fromHexToBytes($countryId), 'shortCode' => '51']
        );
        if ($result === false) {
            return null;
        }

        return (string) $result;
    }

    public function getShippingMethodId(string $technicalName = 'shipping_standard'): ?string
    {
        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM shipping_method
                WHERE technical_name = :technicalName
            ',
            ['technicalName' => $technicalName]
        );

        if ($result === false) {
            return null;
        }

        return (string) $result;
    }

    public function getStateMachineStateId(string $technicalName, $stateTechnicalName): ?string
    {
        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM state_machine
                WHERE technical_name = :technicalName
            ',
            ['technicalName' => $technicalName]
        );

        if ($result === false) {
            return null;
        }
        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM state_machine_state
                WHERE technical_name = :stateTechnicalName
            ',
            ['stateTechnicalName' => $stateTechnicalName]
        );

        return (string) $result;
    }

    public function getInstantDeliveryId(): ?string
    {
        $id = $this->connection->fetchOne('SELECT LOWER(HEX(delivery_time_id)) FROM delivery_time_translation WHERE `name` = "Instant download" LIMIT 1');

        return \is_string($id) ? $id : null;
    }

    private function getLocaleId(string $languageCode): ?string
    {
        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM locale
                WHERE code = :languageCode
            ',
            ['languageCode' => $languageCode]
        );

        if ($result === false) {
            return null;
        }

        return (string) $result;
    }

    public function getStateId(string $state, string $machine): string
    {
        $stateId = $this->connection->fetchOne('
                SELECT LOWER(HEX(state_machine_state.id))
                FROM state_machine_state
                    INNER JOIN  state_machine
                    ON state_machine.id = state_machine_state.state_machine_id
                    AND state_machine.technical_name = :machine
                WHERE state_machine_state.technical_name = :state
            ', [
                'state' => $state,
                'machine' => $machine,
            ]);
        return $stateId;
    }
}
