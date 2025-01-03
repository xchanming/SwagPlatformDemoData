<?php declare(strict_types=1);

namespace Swag\PlatformDemoData\DataProvider;

use Cicada\Core\Content\Product\Aggregate\ProductVisibility\ProductVisibilityDefinition;
use Cicada\Core\Defaults;
use Cicada\Core\Framework\Log\Package;
use Doctrine\DBAL\Connection;
use Swag\PlatformDemoData\Resources\helper\DbHelper;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

#[Package('services-settings')]
class Product2Provider extends DemoDataProvider
{
    private const LOREM_IPSUM = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';

    private Connection $connection;

    private TranslationHelper $translationHelper;

    private DbHelper $dbHelper;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->translationHelper = new TranslationHelper($connection);
        $this->dbHelper = new DbHelper($connection);
    }

    public function getAction(): string
    {
        return 'upsert';
    }

    public function getEntity(): string
    {
        return 'product';
    }

    public function getPayload(): array
    {
        return [
            [
                'id' => '01942d3540717219a16393fd6205c542',
                'productNumber' => 'SWDDMO100013',
                'active' => true,
                'taxId' => $this->dbHelper->getTaxId(),
                'stock' => 40,
                'purchaseUnit' => 250.0,
                'referenceUnit' => 250.0,
                'shippingFree' => true,
                'purchasePrice' => 1.99,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'PDF Reader Pro',
                    'en-GB' => 'PDF Reader Pro',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',

                'media' => [
                    [
                        'id' => '01942d3540717219a16393fd6205c542',
                        'position' => 1,
                        'mediaId' => '01942d380e0b709cb1f7eef0c6093137',
                    ],
                ],
                'coverId' => '01942d3540717219a16393fd6205c542',
                'categories' => [
                    [
                        'id' => 'a515ae260223466f8e37471d279e6406',
                    ],
                ],
                'price' => [[
                    'net' => 1.67,
                    'gross' => 1.99,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d3540717219a16393fd6205c542',
                        'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
                'properties' => [
                    [
                        'id' => '22bdaee755804c1d8099c0d3696e852c',
                    ],
                    [
                        'id' => '77421c4f75af40c8a57657cdc2ad49a2',
                    ],
                ],
            ],
            [
                'id' => '01942d36d34b710fb22871aeb5accaee',
                'productNumber' => 'SWDDMO100014',
                'active' => true,
                'taxId' => $this->dbHelper->getTaxId(),
                'stock' => 40,
                'purchaseUnit' => 250.0,
                'referenceUnit' => 250.0,
                'shippingFree' => true,
                'purchasePrice' => 1.99,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'PDF Reader Pro',
                    'en-GB' => 'PDF Reader Pro',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',

                'media' => [
                    [
                        'id' => '01942d36d34b710fb22871aeb5accaee',
                        'position' => 1,
                        'mediaId' => '01942d380e0b709cb1f7eef0c6093137',
                    ],
                ],
                'coverId' => '01942d36d34b710fb22871aeb5accaee',
                'categories' => [
                    [
                        'id' => 'a515ae260223466f8e37471d279e6406',
                    ],
                ],
                'price' => [[
                    'net' => 1.67,
                    'gross' => 1.99,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d36d34b710fb22871aeb5accaee',
                        'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
                'properties' => [
                    [
                        'id' => '22bdaee755804c1d8099c0d3696e852c',
                    ],
                    [
                        'id' => '77421c4f75af40c8a57657cdc2ad49a2',
                    ],
                ],
            ],
            [
                'id' => '01942d38e7d6734eb9c5fed3c6dfeba1',
                'productNumber' => 'SWDDMO100015',
                'active' => true,
                'taxId' => $this->dbHelper->getTaxId(),
                'stock' => 40,
                'purchaseUnit' => 250.0,
                'referenceUnit' => 250.0,
                'shippingFree' => true,
                'purchasePrice' => 1.99,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Astra Pro Addon v4.8.9 汉化版 – Astra 主题高级插件',
                    'en-GB' => 'Astra Pro Addon v4.8.9',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',

                'media' => [
                    [
                        'id' => '01942d38e7d6734eb9c5fed3c6dfeba1',
                        'position' => 1,
                        'mediaId' => '01942d380e0b709cb1f7eef0c6093137',
                    ],
                ],
                'coverId' => '01942d38e7d6734eb9c5fed3c6dfeba1',
                'categories' => [
                    [
                        'id' => 'a515ae260223466f8e37471d279e6406',
                    ],
                ],
                'price' => [[
                    'net' => 1.67,
                    'gross' => 1.99,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d38e7d6734eb9c5fed3c6dfeba1',
                        'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
                'properties' => [
                    [
                        'id' => '22bdaee755804c1d8099c0d3696e852c',
                    ],
                    [
                        'id' => '77421c4f75af40c8a57657cdc2ad49a2',
                    ],
                ],
            ],
        ];
    }
}
