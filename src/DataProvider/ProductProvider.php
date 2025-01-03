<?php

declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PlatformDemoData\DataProvider;

use Cicada\Core\Content\Product\Aggregate\ProductVisibility\ProductVisibilityDefinition;
use Cicada\Core\Defaults;
use Cicada\Core\Framework\Log\Package;
use Cicada\Core\Framework\Uuid\Uuid;
use Doctrine\DBAL\Connection;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

#[Package('services-settings')]
class ProductProvider extends DemoDataProvider
{
    private const LOREM_IPSUM = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';

    private Connection $connection;

    private TranslationHelper $translationHelper;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->translationHelper = new TranslationHelper($connection);
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
        $taxId = $this->getTaxId();
        $storefrontSalesChannel = $this->getStorefrontSalesChannel();

        return [
            [
                'id' => '11dc680240b04f469ccba354cbf0b967',
                'productNumber' => 'SWDEMO10002',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 10,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 950,
                'weight' => 45.0,
                'width' => 590.0,
                'height' => 600.0,
                'length' => 840.0,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Hauptprodukt mit erweiterten Preisen',
                    'en-GB' => 'Main product with advanced prices',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',
                'media' => [
                    [
                        'id' => 'e648140ff1f04177b40128ac6b649d8a',
                        'position' => 1,
                        'mediaId' => '84356a71233d4b3e9f417dcc8850c82f',
                    ],
                ],
                'coverId' => 'e648140ff1f04177b40128ac6b649d8a',
                'categories' => [
                    [
                        'id' => '251448b91bc742de85643f5fccd89051',
                    ],
                ],
                'price' => [[
                    'net' => 798.3199999999999,
                    'gross' => 950,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'prices' => [
                    [
                        'ruleId' => '28caae75a5624f0d985abd0eb32aa160',
                        'price' => [[
                            'net' => 630.25,
                            'gross' => 750,
                            'linked' => true,
                            'currencyId' => Defaults::CURRENCY,
                        ]],
                        'quantityStart' => 12,
                        'quantityEnd' => null,
                    ],
                    [
                        'ruleId' => '28caae75a5624f0d985abd0eb32aa160',
                        'price' => [[
                            'net' => 672.27,
                            'gross' => 800,
                            'linked' => true,
                            'currencyId' => Defaults::CURRENCY,
                        ]],
                        'quantityStart' => 1,
                        'quantityEnd' => 11,
                    ],
                ],
                'visibilities' => [
                    [
                        'id' => '69cd1be4be004944b923ddbe571e96f5',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '1901dc5e888f4b1ea4168c2c5f005540',
                'productNumber' => 'SWDEMO100013',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 40,
                'purchaseUnit' => 250.0,
                'referenceUnit' => 250.0,
                'shippingFree' => false,
                'purchasePrice' => 1.99,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Hauptprodukt mit Bewertungen',
                    'en-GB' => 'Main product with reviews',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',

                'media' => [
                    [
                        'id' => '0ca83b27e34c4b1f9ab00aed4e3b8b03',
                        'position' => 1,
                        'mediaId' => '6968ad64888844679918c638e449ffc5',
                    ],
                ],
                'coverId' => '0ca83b27e34c4b1f9ab00aed4e3b8b03',
                'categories' => [
                    [
                        'id' => 'bb22b05bff9140f3808b1cff975b75eb',
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
                        'id' => '161494e90196481da9fd9a99e1462706',
                        'salesChannelId' => $storefrontSalesChannel,
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
                'id' => '2a88d9b59d474c7e869d8071649be43c',
                'productNumber' => 'SWDEMO10001',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 10,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => false,
                'purchasePrice' => 495.95,
                'weight' => 0.17,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Hauptartikel',
                    'en-GB' => 'Main product',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',

                'media' => [
                    [
                        'id' => 'f0e28db1195847dc9acb8eb016473e0c',
                        'position' => 1,
                        'mediaId' => '70e352200b5c45098dc65a5b47094a2a',
                    ],
                ],
                'coverId' => 'f0e28db1195847dc9acb8eb016473e0c',
                'categories' => [
                    [
                        'id' => '251448b91bc742de85643f5fccd89051',
                    ],
                ],
                'price' => [[
                    'net' => 416.76,
                    'gross' => 495.95,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => 'c835fb65b685416196fbae58a508b82a',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
                'properties' => [
                    [
                        'id' => '6f9359239c994b48b7de282ee19a714d',
                    ],
                    [
                        'id' => '78c53f3f6dd14eb4927978415bfb74db',
                    ],
                    [
                        'id' => '7cab88165ae5420f921232511b6e8f7d',
                    ],
                    [
                        'id' => 'dc6f98beeca44852beb078a9e8e21e7d',
                    ],
                ],
            ],
            [
                'id' => '3ac014f329884b57a2cce5a29f34779c',
                'productNumber' => 'SWDEMO10006',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 50,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 20,
                'weight' => 0.15,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Hauptprodukt, versandkostenfrei mit Hervorhebung',
                    'en-GB' => 'Main product, free shipping with highlighting',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',
                'media' => [
                    [
                        'id' => 'd6448ce8dd0e4720a92c1bdddb9e6c96',
                        'position' => 1,
                        'mediaId' => '2de02991cd0548a4ac6cc35cb11773a0',
                    ],
                ],
                'coverId' => 'd6448ce8dd0e4720a92c1bdddb9e6c96',
                'categories' => [
                    [
                        'id' => 'a515ae260223466f8e37471d279e6406',
                    ],
                ],
                'price' => [[
                    'net' => 15,
                    'gross' => 20,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '055eac2f437c4e2c9a423c268f6b9ebb',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
                'properties' => [
                    [
                        'id' => '5997d91dc0784997bdef68dfc5a08912',
                    ],
                    [
                        'id' => '78c53f3f6dd14eb4927978415bfb74db',
                    ],
                    [
                        'id' => 'c53fa30db00e4a84b4516f6b07c02e8d',
                    ],
                ],
            ],
            [
                'id' => '43a23e0c03bf4ceabc6055a2185faa87',
                'productNumber' => 'SWDEMO10005',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 50,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 19.99,
                'weight' => 0.5,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Variantenprodukt',
                    'en-GB' => 'Variant product',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '7f24e96676e944b0a0addc20d56728cb',
                'media' => [
                    [
                        'id' => '55a1e7d9f9e84400a17e2b86d7a3fc89',
                        'position' => 1,
                        'mediaId' => '102ac62ba27347a688030a05c1790db7',
                    ],
                ],
                'coverId' => '55a1e7d9f9e84400a17e2b86d7a3fc89',
                'categories' => [
                    [
                        'id' => 'a515ae260223466f8e37471d279e6406',
                    ],
                ],
                'price' => [[
                    'net' => 16.799999999999997,
                    'gross' => 19.99,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '6c6041a1de0940378ab05ad4ca892745',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
                'properties' => [
                    [
                        'id' => '5997d91dc0784997bdef68dfc5a08912',
                    ],
                    [
                        'id' => '7cab88165ae5420f921232511b6e8f7d',
                    ],
                    [
                        'id' => '96638a1c7ab847bbb3ca64167ab30a3e',
                    ],
                    [
                        'id' => 'acfd7586d02848f1ac801f4776efa414',
                    ],
                ],
                'configuratorSettings' => [
                    [
                        'optionId' => 'acfd7586d02848f1ac801f4776efa414',
                    ],
                    [
                        'optionId' => '2bfd278e87204807a890da4a3e81dd90',
                        'mediaId' => '6cbbdc03b43f4207be80b5f752d5a1c4',
                    ],
                    [
                        'optionId' => '5997d91dc0784997bdef68dfc5a08912',
                    ],
                    [
                        'optionId' => '52454db2adf942b2ac079a296f454a10',
                        'mediaId' => 'f69ab8ae42d04e17b2bab5ec2ff0a93c',
                    ],
                    [
                        'optionId' => 'ad735af1ebfb421e93e408b073c4a89a',
                        'mediaId' => '102ac62ba27347a688030a05c1790db7',
                    ],
                ],
                'children' => [
                    [
                        'productNumber' => 'SWDEMO10005.1',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => '2bfd278e87204807a890da4a3e81dd90',
                            ],
                            [
                                'id' => '5997d91dc0784997bdef68dfc5a08912',
                            ],
                        ],
                    ],
                    [
                        'productNumber' => 'SWDEMO10005.2',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => '2bfd278e87204807a890da4a3e81dd90',
                            ],
                            [
                                'id' => 'acfd7586d02848f1ac801f4776efa414',
                            ],
                        ],
                    ],
                    [
                        'productNumber' => 'SWDEMO10005.3',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => '52454db2adf942b2ac079a296f454a10',
                            ],
                            [
                                'id' => '5997d91dc0784997bdef68dfc5a08912',
                            ],
                        ],
                    ],
                    [
                        'productNumber' => 'SWDEMO10005.4',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => '52454db2adf942b2ac079a296f454a10',
                            ],
                            [
                                'id' => 'acfd7586d02848f1ac801f4776efa414',
                            ],
                        ],
                    ],
                    [
                        'productNumber' => 'SWDEMO10005.5',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => 'ad735af1ebfb421e93e408b073c4a89a',
                            ],
                            [
                                'id' => '5997d91dc0784997bdef68dfc5a08912',
                            ],
                        ],
                    ],
                    [
                        'productNumber' => 'SWDEMO10005.6',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => 'ad735af1ebfb421e93e408b073c4a89a',
                            ],
                            [
                                'id' => 'acfd7586d02848f1ac801f4776efa414',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'id' => 'c7bca22753c84d08b6178a50052b4146',
                'productNumber' => 'SWDEMO10007',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 50,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 19.99,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Hauptprodukt mit Eigenschaften',
                    'en-GB' => 'Main product with properties',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '7f24e96676e944b0a0addc20d56728cb',
                'media' => [
                    [
                        'id' => '683c3a0a0c26464fb65332d1a9adf7e2',
                        'position' => 1,
                        'mediaId' => '5808d194947f415495d9782d8fdc92ae',
                    ],
                ],
                'coverId' => '683c3a0a0c26464fb65332d1a9adf7e2',
                'categories' => [
                    [
                        'id' => 'a515ae260223466f8e37471d279e6406',
                    ],
                ],
                'price' => [[
                    'net' => 16.799999999999997,
                    'gross' => 19.99,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '8aae932871634fe8a6f485da0d9df6cd',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
                'properties' => [
                    [
                        'id' => '41e5013b67d64d3a92b7a275da8af441',
                    ],
                    [
                        'id' => '5193ffa5de8648a1bcfba1fa8a26c02b',
                    ],
                    [
                        'id' => '54147692cbfb43419a6d11e26cad44dc',
                    ],
                    [
                        'id' => '5997d91dc0784997bdef68dfc5a08912',
                    ],
                    [
                        'id' => '78c53f3f6dd14eb4927978415bfb74db',
                    ],
                    [
                        'id' => '96638a1c7ab847bbb3ca64167ab30a3e',
                    ],
                    [
                        'id' => 'acfd7586d02848f1ac801f4776efa414',
                    ],
                ],
                'configuratorSettings' => [
                    [
                        'optionId' => 'acfd7586d02848f1ac801f4776efa414',
                    ],
                    [
                        'optionId' => '41e5013b67d64d3a92b7a275da8af441',
                    ],
                    [
                        'optionId' => '5997d91dc0784997bdef68dfc5a08912',
                    ],
                    [
                        'optionId' => '54147692cbfb43419a6d11e26cad44dc',
                    ],
                ],
                'children' => [
                    [
                        'productNumber' => 'SWDEMO10007.1',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => '41e5013b67d64d3a92b7a275da8af441',
                            ],
                        ],
                    ],
                    [
                        'productNumber' => 'SWDEMO10007.2',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => '54147692cbfb43419a6d11e26cad44dc',
                            ],
                        ],
                    ],
                    [
                        'productNumber' => 'SWDEMO10007.3',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => '5997d91dc0784997bdef68dfc5a08912',
                            ],
                        ],
                    ],
                    [
                        'productNumber' => 'SWDEMO10007.4',
                        'stock' => 50,
                        'options' => [
                            [
                                'id' => 'acfd7586d02848f1ac801f4776efa414',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'id' => '01942cff521370a5a751129858c6caeb',
                'productNumber' => 'CC1000010002',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 950,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Mac FoneLab for iOS 10.5.58.149578 iOS设备数据快速恢复软件',
                    'en-GB' => 'Mac FoneLab for iOS 10.5.58.149578',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',

                'media' => [
                    [
                        'id' => '01942d0162cf721f8a7ffe5f7b0c8dfe',
                        'position' => 1,
                        'mediaId' => '01942d0114ba736abbc99a36328a0f31',
                    ],
                ],
                'coverId' => '01942d0162cf721f8a7ffe5f7b0c8dfe',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 100,
                    'gross' => 100,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d03b19a7343acf1c06e42c78e05',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d049499719a8f30300c42593ce9',
                'productNumber' => 'CC1000010003',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => '4K YouTube to MP3 5.7.4 在线视频提取音乐',
                    'en-GB' => '4K YouTube to MP3 5.7.4',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',

                'media' => [
                    [
                        'id' => '01942d055737728fbeb8118937bc6c10',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d055737728fbeb8118937bc6c10',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 120,
                    'gross' => 120,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d0e3c5b721383385a467b976b7f',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d0c53f172499642029fbf9fa848',
                'productNumber' => 'CC1000010004',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'EdgeView 4.9.6 图像查看器',
                    'en-GB' => 'EdgeView 4.9.6',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => 'cc1c20c365d34cfb88bfab3c3e81d350',

                'media' => [
                    [
                        'id' => '01942d14790073aab3def5efd7dbcbc8',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d14790073aab3def5efd7dbcbc8',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 50,
                    'gross' => 50,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d0e19e6719ab8ad6a5f594fa162',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d0e99a57124b81bb93b535f807b',
                'productNumber' => 'CC1000010005',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 0,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Adobe Acrobat Pro DC',
                    'en-GB' => 'Adobe Acrobat Pro DC',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '2326d67406134c88bcf80e52d9d2ecb7',

                'media' => [
                    [
                        'id' => '01942d145f9d71fbb5dfbc7612b1d0b2',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d145f9d71fbb5dfbc7612b1d0b2',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 60,
                    'gross' => 60,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d0f8002722e89a076c6a5e9feee',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d0fb7607249aa413c00c2480644',
                'productNumber' => 'CC1000010006',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 0,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'PullTube：油管视频下载',
                    'en-GB' => 'PullTube',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '2326d67406134c88bcf80e52d9d2ecb7',

                'media' => [
                    [
                        'id' => '01942d143e1b72568a76847c2e5a56ee',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d143e1b72568a76847c2e5a56ee',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 450,
                    'gross' => 450,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d103c96709da050bb6b96ca1869',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d10980b73bb96645b4339f7f3df',
                'productNumber' => 'CC1000010007',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 0,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Typora1.9.3',
                    'en-GB' => 'Typora1.9.3',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '2326d67406134c88bcf80e52d9d2ecb7',

                'media' => [
                    [
                        'id' => '01942d1424697366915077e397b97bdc',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d1424697366915077e397b97bdc',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 700,
                    'gross' => 700,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d10e7807162906a2afd00248b94',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d113c0270ec82ff7ec33079e765',
                'productNumber' => 'CC1000010008',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 0,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'GoodTask',
                    'en-GB' => 'GoodTask',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d140c597205be8061b4817d8902',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d140c597205be8061b4817d8902',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 20,
                    'gross' => 20,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d11d6507112a039fb84bb08278c',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d1247a772308f5d1173563853e5',
                'productNumber' => 'CC1000010009',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 0,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Idea',
                    'en-GB' => 'Idea',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d13ef64729ab9a79f959825b582',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d13ef64729ab9a79f959825b582',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 20,
                    'gross' => 20,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d12682772f3bb8d85201a5574bc',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d12ca40712bba47864bf02accf1',
                'productNumber' => 'CC1000010010',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 0,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Idea',
                    'en-GB' => 'Idea',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d13bc0471eb905c0f5dfa2aba1f',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d13bc0471eb905c0f5dfa2aba1f',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 20,
                    'gross' => 20,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d12e92c733e90594ee329fe996d',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d133d7573cfa9ec044567fab505',
                'productNumber' => 'CC1000010011',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 0,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Idea',
                    'en-GB' => 'Idea',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d133d7573cfa9ec044567fab505',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d133d7573cfa9ec044567fab505',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 20,
                    'gross' => 20,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d133d7573cfa9ec044567fab505',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d15bc407205a520d635d6583f9a',
                'productNumber' => 'DD1000010003',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Phpstorm 6.6.60',
                    'en-GB' => 'Phpstorm 6.6.60',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d15bc407205a520d635d6583f9a',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d15bc407205a520d635d6583f9a',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 120,
                    'gross' => 120,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d15bc407205a520d635d6583f9a',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d1674f071838d49fe3f39dc3ad1',
                'productNumber' => 'DD1000010004',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'OmniPlan Pro 6.6.60',
                    'en-GB' => 'Phpstorm Pro 6.6.60',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d1674f071838d49fe3f39dc3ad1',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d1674f071838d49fe3f39dc3ad1',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 120,
                    'gross' => 120,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d1674f071838d49fe3f39dc3ad1',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d26c06472f481e3dcef26ccedae',
                'productNumber' => 'DD1000010005',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'CompressX 1.7',
                    'en-GB' => 'CompressX 1.7',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d26c06472f481e3dcef26ccedae',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d26c06472f481e3dcef26ccedae',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 122,
                    'gross' => 122,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d26c06472f481e3dcef26ccedae',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d27a10c737a822968072ccf31b3',
                'productNumber' => 'DD1000010006',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Termius',
                    'en-GB' => 'Termius',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d27a10c737a822968072ccf31b3',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d27a10c737a822968072ccf31b3',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 122,
                    'gross' => 122,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d27a10c737a822968072ccf31b3',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d28417a7159a4082a11513ae354',
                'productNumber' => 'DD1000010007',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Parallels Desktop V8',
                    'en-GB' => 'Parallels Desktop V8',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d28417a7159a4082a11513ae354',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d28417a7159a4082a11513ae354',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 1000,
                    'gross' => 1000,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d28417a7159a4082a11513ae354',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2958db70c1a4a6c8e1e9c074c9',
                'productNumber' => 'DD1000010008',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'QuickRecorder',
                    'en-GB' => 'QuickRecorder',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2958db70c1a4a6c8e1e9c074c9',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2958db70c1a4a6c8e1e9c074c9',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2958db70c1a4a6c8e1e9c074c9',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2a71157009b3269f4fe1f775af',
                'productNumber' => 'DD1000010009',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'PlayCover',
                    'en-GB' => 'PlayCover',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2a71157009b3269f4fe1f775af',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2a71157009b3269f4fe1f775af',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2a71157009b3269f4fe1f775af',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2af376700e8dd9a425394ed8dc',
                'productNumber' => 'DD1000010010',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'NeoHtop',
                    'en-GB' => 'NeoHtop',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2af376700e8dd9a425394ed8dc',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2af376700e8dd9a425394ed8dc',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2af376700e8dd9a425394ed8dc',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2b7e39710e92ca695df0541849',
                'productNumber' => 'DD1000010011',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Sentinel',
                    'en-GB' => 'Sentinel',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2b7e39710e92ca695df0541849',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2b7e39710e92ca695df0541849',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2b7e39710e92ca695df0541849',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2bf79a73209f69b7b9a75511a5',
                'productNumber' => 'DD1000010012',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'TrollInstallerX',
                    'en-GB' => 'TrollInstallerX',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2bf79a73209f69b7b9a75511a5',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2bf79a73209f69b7b9a75511a5',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2bf79a73209f69b7b9a75511a5',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2c7464722ca6d71006155488b0',
                'productNumber' => 'DD1000010013',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'PlayCover',
                    'en-GB' => 'PlayCover',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2c7464722ca6d71006155488b0',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2c7464722ca6d71006155488b0',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2c7464722ca6d71006155488b0',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2d883773cbb3db7169e1d1632e',
                'productNumber' => 'DD1000010014',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Telegram',
                    'en-GB' => 'Telegram',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2d883773cbb3db7169e1d1632e',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2d883773cbb3db7169e1d1632e',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2d883773cbb3db7169e1d1632e',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2e19757070aacad8a7623adfa6',
                'productNumber' => 'DD1000010015',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'MacOS 13 Ventura',
                    'en-GB' => 'MacOS 13 Ventura',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2e19757070aacad8a7623adfa6',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2e19757070aacad8a7623adfa6',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2e19757070aacad8a7623adfa6',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2e972c71959617f564720294ca',
                'productNumber' => 'DD1000010016',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'MacOS Sonoma',
                    'en-GB' => 'MacOS Sonoma',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2e972c71959617f564720294ca',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2e972c71959617f564720294ca',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2e972c71959617f564720294ca',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
            [
                'id' => '01942d2f4643739ab3c1e9761c094c62',
                'productNumber' => 'DD1000010017',
                'active' => true,
                'taxId' => $taxId,
                'stock' => 300,
                'purchaseUnit' => 1.0,
                'referenceUnit' => 1.0,
                'shippingFree' => true,
                'purchasePrice' => 600,
                'releaseDate' => new \DateTimeImmutable(),
                'displayInListing' => true,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Mihomo Party',
                    'en-GB' => 'Mihomo Party',
                ]),
                'description' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => self::LOREM_IPSUM,
                    'en-GB' => self::LOREM_IPSUM,
                ]),
                'manufacturerId' => '01942d007c6a7277a2a058fa0b90322a',

                'media' => [
                    [
                        'id' => '01942d2f4643739ab3c1e9761c094c62',
                        'position' => 1,
                        'mediaId' => '01942d0582d071a1acca7b87bc371683',
                    ],
                ],
                'coverId' => '01942d2f4643739ab3c1e9761c094c62',
                'categories' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                    ],
                ],
                'price' => [[
                    'net' => 0.01,
                    'gross' => 0.01,
                    'linked' => true,
                    'currencyId' => Defaults::CURRENCY,
                ]],
                'visibilities' => [
                    [
                        'id' => '01942d2f4643739ab3c1e9761c094c62',
                        'salesChannelId' => $storefrontSalesChannel,
                        'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
                    ],
                ],
            ],
        ];
    }

    private function getTaxId(): string
    {
        $result = $this->connection->fetchOne('
            SELECT LOWER(HEX(COALESCE(
                (SELECT `id` FROM `tax` WHERE tax_rate = "19.00" LIMIT 1),
	            (SELECT `id` FROM `tax`  LIMIT 1)
            )))
        ');

        if (!$result) {
            throw new \RuntimeException('No tax found, please make sure that basic data is available by running the migrations.');
        }

        return (string) $result;
    }

    private function getStorefrontSalesChannel(): string
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
}
