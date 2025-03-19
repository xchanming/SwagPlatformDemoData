<?php

declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PlatformDemoData\DataProvider;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

#[Package('services-settings')]
class CmsPageProvider extends DemoDataProvider
{
    private TranslationHelper $translationHelper;

    public function __construct(Connection $connection)
    {
        $this->translationHelper = new TranslationHelper($connection);
    }

    public function getAction(): string
    {
        return 'upsert';
    }

    public function getEntity(): string
    {
        return 'cms_page';
    }

    public function getPayload(): array
    {
        return [
            [
                'id' => '695477e02ef643e5a016b83ed4cdf63a',
                'type' => 'landingpage',
                'locked' => 0,
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => '首页',
                    'en-GB' => 'Homepage',
                ]),
                'sections' => [
                    [
                        'id' => '935477e02ef643e5a016b83ed4cdf63a',
                        'backgroundMediaMode' => 'cover',
                        'type' => 'default',
                        'position' => 0,
                        'blocks' => [
                            [
                                'id' => '01942cabd4d1701eb123bebacb491268',
                                'position' => 0,
                                'type' => 'text-on-image',
                                'sectionPosition' => 'main',
                                'marginLeft' => '0',
                                'marginRight' => '0',
                                'backgroundMediaMode' => 'cover',
                                'backgroundMediaId' => 'de4b7dbe9d95435092cb85ce146ced28',
                                'slots' => [
                                    [
                                        'id' => '9e2f55fac84647098fe5b0f17ee4786f',
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => [
                                                'config' => [
                                                    'content' => [
                                                        'source' => 'static',
                                                        'value' => '<h2 style="text-align: center; color: #FFFFFF">Lorem Ipsum</h2>
                        <p style="text-align: center; color: #FFFFFF">Lorem ipsum dolor sit amet, consetetur
                        sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        lorem ipsum dolor sit amet.</p>',
                                                    ],
                                                    'verticalAlign' => [
                                                        'value' => null,
                                                        'source' => 'static',
                                                    ],
                                                ],
                                            ],
                                            'en-GB' => [
                                                'config' => [
                                                    'content' => [
                                                        'source' => 'static',
                                                        'value' => '<h2 style="text-align: center; color: #FFFFFF">Lorem Ipsum</h2>
                        <p style="text-align: center; color: #FFFFFF">Lorem ipsum dolor sit amet, consetetur
                        sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        lorem ipsum dolor sit amet.</p>',
                                                    ],
                                                    'verticalAlign' => [
                                                        'value' => null,
                                                        'source' => 'static',
                                                    ],
                                                ],
                                            ],
                                        ]),
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'id' => '01942cbac1fd7f118ce5ebb900f3a223',
                        'type' => 'default',
                        'position' => 1,
                        'cssClass' => 'mt-2',
                        'blocks' => [
                            [
                                'id' => '01942cbbd2a0713b858d87beb17c3db9',
                                'position' => 0,
                                'type' => 'product-three-column',
                                'sectionPosition' => 'main',
                                'marginLeft' => '0',
                                'marginRight' => '0',
                                'backgroundMediaMode' => 'cover',
                                'slots' => [
                                    [
                                        'id' => '01942cbbd2a0713b858d87bfcfbbe1c7',
                                        'type' => 'product-box',
                                        'slot' => 'left',
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => [
                                                'config' => [
                                                    'product' => [
                                                        'source' => 'static',
                                                        'value' => '11dc680240b04f469ccba354cbf0b967',
                                                    ],
                                                    'boxLayout' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'displayMode' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'verticalAlign' => [
                                                        'source' => 'static',
                                                        'value' => null,
                                                    ],
                                                ],
                                            ],
                                            'en-GB' => [
                                                'config' => [
                                                    'product' => [
                                                        'source' => 'static',
                                                        'value' => '11dc680240b04f469ccba354cbf0b967',
                                                    ],
                                                    'boxLayout' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'displayMode' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'verticalAlign' => [
                                                        'source' => 'static',
                                                        'value' => null,
                                                    ],
                                                ],
                                            ],
                                        ]),
                                    ],
                                    [
                                        'id' => '01942cbbd2a0713b858d87c0e78dc8dc',
                                        'type' => 'product-box',
                                        'slot' => 'center',
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => [
                                                'config' => [
                                                    'product' => [
                                                        'source' => 'static',
                                                        'value' => 'c7bca22753c84d08b6178a50052b4146',
                                                    ],
                                                    'boxLayout' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'displayMode' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'verticalAlign' => [
                                                        'source' => 'static',
                                                        'value' => null,
                                                    ],
                                                ],
                                            ],
                                            'en-GB' => [
                                                'config' => [
                                                    'product' => [
                                                        'source' => 'static',
                                                        'value' => 'c7bca22753c84d08b6178a50052b4146',
                                                    ],
                                                    'boxLayout' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'displayMode' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'verticalAlign' => [
                                                        'source' => 'static',
                                                        'value' => null,
                                                    ],
                                                ],
                                            ],
                                        ]),
                                    ],
                                    [
                                        'id' => '01942cbbd2a0713b858d87c197fb500c',
                                        'type' => 'product-box',
                                        'slot' => 'right',
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => [
                                                'config' => [
                                                    'product' => [
                                                        'source' => 'static',
                                                        'value' => '2a88d9b59d474c7e869d8071649be43c',
                                                    ],
                                                    'boxLayout' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'displayMode' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'verticalAlign' => [
                                                        'source' => 'static',
                                                        'value' => null,
                                                    ],
                                                ],
                                            ],
                                            'en-GB' => [
                                                'config' => [
                                                    'product' => [
                                                        'source' => 'static',
                                                        'value' => '2a88d9b59d474c7e869d8071649be43c',
                                                    ],
                                                    'boxLayout' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'displayMode' => [
                                                        'source' => 'static',
                                                        'value' => 'standard',
                                                    ],
                                                    'verticalAlign' => [
                                                        'source' => 'static',
                                                        'value' => null,
                                                    ],
                                                ],
                                            ],
                                        ]),
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
