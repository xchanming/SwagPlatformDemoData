<?php

declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PlatformDemoData\DataProvider;

use Doctrine\DBAL\Connection;
use Shopware\Core\Content\Category\CategoryCollection;
use Shopware\Core\Framework\Api\Context\SystemSource;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\Log\Package;
use Swag\PlatformDemoData\Resources\helper\DbHelper;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

#[Package('fundamentals@after-sales')]
class CategoryProvider extends DemoDataProvider
{
    /**
     * @var EntityRepository<CategoryCollection>
     */
    private EntityRepository $categoryRepository;

    private Connection $connection;

    private TranslationHelper $translationHelper;

    private DbHelper $dbHelper;

    /**
     * @param EntityRepository<CategoryCollection> $categoryRepository
     */
    public function __construct(EntityRepository $categoryRepository, Connection $connection)
    {
        $this->categoryRepository = $categoryRepository;
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
        return 'category';
    }

    public function getPayload(): array
    {
        $cmsPageId = $this->getDefaultCmsListingPageId();

        return [
            [
                'id' => $this->getRootCategoryId(),
                'cmsPageId' => '695477e02ef643e5a016b83ed4cdf63a',
                'active' => true,
                'displayNestedProducts' => true,
                'visible' => true,
                'type' => 'page',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => '蝉鸣平台商城演示系统',
                    'en-GB' => 'Shopware Chirping Platform Store Demo System',
                ]),
                'children' => [
                    [
                        'id' => '77b959cf66de4c1590c7f9b7da3982f3',
                        'cmsPageId' => $cmsPageId,
                        'active' => true,
                        'displayNestedProducts' => true,
                        'visible' => true,
                        'type' => 'page',
                        'name' => $this->translationHelper->adjustTranslations([
                            'zh-CN' => '软件',
                            'en-GB' => 'Software',
                        ]),
                        'children' => [
                            [
                                'id' => '19ca405790ff4f07aac8c599d4317868',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '开发工具',
                                    'en-GB' => 'Development Tools',
                                ]),
                            ],
                            [
                                'id' => '48f97f432fd041388b2630184139cf0e',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '19ca405790ff4f07aac8c599d4317868',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '网络工具',
                                    'en-GB' => 'Network Tools',
                                ]),
                            ],
                            [
                                'id' => 'bb22b05bff9140f3808b1cff975b75eb',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '48f97f432fd041388b2630184139cf0e',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '游戏',
                                    'en-GB' => 'Games',
                                ]),
                            ],
                            [
                                'id' => '01942bcefffe722ab0a3cb8668af9629',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => 'bb22b05bff9140f3808b1cff975b75eb',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '图形设计',
                                    'en-GB' => 'Design',
                                ]),
                            ],
                        ],
                    ],
                    [
                        'id' => 'a515ae260223466f8e37471d279e6406',
                        'cmsPageId' => $cmsPageId,
                        'active' => true,
                        'displayNestedProducts' => true,
                        'visible' => true,
                        'type' => 'page',
                        'afterCategoryId' => '77b959cf66de4c1590c7f9b7da3982f3',
                        'name' => $this->translationHelper->adjustTranslations([
                            'zh-CN' => '主题',
                            'en-GB' => 'Themes',
                        ]),
                        'children' => [
                            [
                                'id' => '8de9b484c54f441c894774e5f57e485c',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '企业门户',
                                    'en-GB' => 'Business Themes',
                                ]),
                            ],
                            [
                                'id' => '2185182cbbd4462ea844abeb2a438b33',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '8de9b484c54f441c894774e5f57e485c',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '家居与家具',
                                    'en-GB' => 'Home & Furniture',
                                ]),
                            ],
                            [
                                'id' => '01942bd12656727bb4b2678dd78ee43d',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '2185182cbbd4462ea844abeb2a438b33',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '时尚与服装',
                                    'en-GB' => 'Fashion & Apparel',
                                ]),
                            ],
                            [
                                'id' => '01942bd4486771b49218d33a2252544d',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '01942bd12656727bb4b2678dd78ee43d',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '食品与饮料',
                                    'en-GB' => 'Food & Beverage',
                                ]),
                            ],
                            [
                                'id' => '01942bd4cc087336a606dd4861ffdfaa',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '01942bd4486771b49218d33a2252544d',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '美容与健康',
                                    'en-GB' => 'Beauty & Health',
                                ]),
                            ],
                            [
                                'id' => '01942bd53cb5706492b2db6c60febde4',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '01942bd4cc087336a606dd4861ffdfaa',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '体育与户外',
                                    'en-GB' => 'Sports & Outdoor',
                                ]),
                            ],
                            [
                                'id' => '01942bd5a45c728d8c38ee6b1a4cf26a',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '01942bd53cb5706492b2db6c60febde4',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '电子产品',
                                    'en-GB' => 'Electronics',
                                ]),
                            ],
                            [
                                'id' => '01942bd658fd72058a0b5ae9796689f7',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '01942bd5a45c728d8c38ee6b1a4cf26a',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '数字产品',
                                    'en-GB' => 'Digital Products',
                                ]),
                            ],
                            [
                                'id' => '01942bd6bafd7286af5302a80b760691',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '01942bd658fd72058a0b5ae9796689f7',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '多用途主题',
                                    'en-GB' => 'Multipurpose Themes',
                                ]),
                            ],
                        ],
                    ],
                    [
                        'id' => '251448b91bc742de85643f5fccd89051',
                        'cmsPageId' => $cmsPageId,
                        'active' => true,
                        'displayNestedProducts' => true,
                        'visible' => true,
                        'type' => 'page',
                        'afterCategoryId' => 'a515ae260223466f8e37471d279e6406',
                        'name' => $this->translationHelper->adjustTranslations([
                            'zh-CN' => '页面',
                            'en-GB' => 'Pages',
                        ]),
                    ],
                    [
                        'id' => '01942ce041de71cfbb175364b166dd4d',
                        'cmsPageId' => $cmsPageId,
                        'active' => true,
                        'displayNestedProducts' => true,
                        'visible' => false,
                        'type' => 'page',
                        'afterCategoryId' => '251448b91bc742de85643f5fccd89051',
                        'name' => $this->translationHelper->adjustTranslations([
                            'zh-CN' => '页脚导航',
                            'en-GB' => 'Footer navigation',
                        ]),
                        'footerSalesChannels' => [
                            [
                                'id' => $this->dbHelper->getStorefrontSalesChannel(),
                            ],
                        ],
                        'children' => [
                            [
                                'id' => '01942ce52907722cb7a1c6028669d370',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '其他链接',
                                    'en-GB' => 'Other links',
                                ]),
                                'children' => [
                                    [
                                        'id' => '01942cef6d9071b88d31d7ddd7099e5d',
                                        'cmsPageId' => $cmsPageId,
                                        'active' => true,
                                        'displayNestedProducts' => true,
                                        'visible' => true,
                                        'type' => 'page',
                                        'name' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => '源码下载',
                                            'en-GB' => 'Download',
                                        ]),
                                    ],
                                    [
                                        'id' => '01942cf0a59670a9becc651476cf3563',
                                        'cmsPageId' => $cmsPageId,
                                        'active' => true,
                                        'displayNestedProducts' => true,
                                        'visible' => true,
                                        'type' => 'page',
                                        'afterCategoryId' => '01942cef6d9071b88d31d7ddd7099e5d',
                                        'name' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => '帮助文档',
                                            'en-GB' => 'Documentation',
                                        ]),
                                    ],
                                    [
                                        'id' => '01942cf1733873baa3f0840c98cd4ff9',
                                        'cmsPageId' => $cmsPageId,
                                        'active' => true,
                                        'displayNestedProducts' => true,
                                        'visible' => true,
                                        'type' => 'page',
                                        'afterCategoryId' => '01942cf0a59670a9becc651476cf3563',
                                        'name' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => '定制合作',
                                            'en-GB' => 'Customized collaboration',
                                        ]),
                                    ],
                                    [
                                        'id' => '01942cf2dc5270969eb5e288a2622e02',
                                        'cmsPageId' => $cmsPageId,
                                        'active' => true,
                                        'displayNestedProducts' => true,
                                        'visible' => true,
                                        'type' => 'page',
                                        'afterCategoryId' => '01942cf1733873baa3f0840c98cd4ff9',
                                        'name' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => '问答社区',
                                            'en-GB' => 'Q&A community',
                                        ]),
                                    ],
                                ],
                            ],
                            [
                                'id' => '01942cebe8c97092a471f1bd60f8beb9',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '01942ce52907722cb7a1c6028669d370',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '关于我们',
                                    'en-GB' => 'About Us',
                                ]),
                                'children' => [
                                    [
                                        'id' => '01942cf3bfe071a7951dbd3ea7ed98ef',
                                        'cmsPageId' => $cmsPageId,
                                        'active' => true,
                                        'displayNestedProducts' => true,
                                        'visible' => true,
                                        'type' => 'page',
                                        'name' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => '合作伙伴',
                                            'en-GB' => 'partner',
                                        ]),
                                    ],
                                    [
                                        'id' => '01942cf46b90719b958f9803433cf434',
                                        'cmsPageId' => $cmsPageId,
                                        'active' => true,
                                        'displayNestedProducts' => true,
                                        'visible' => true,
                                        'type' => 'page',
                                        'afterCategoryId' => '01942cf3bfe071a7951dbd3ea7ed98ef',
                                        'name' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => '联系我们',
                                            'en-GB' => 'Contact Us',
                                        ]),
                                    ],
                                    [
                                        'id' => '01942cf51b49701689690cbb1ea41911',
                                        'cmsPageId' => $cmsPageId,
                                        'active' => true,
                                        'displayNestedProducts' => true,
                                        'visible' => true,
                                        'type' => 'page',
                                        'afterCategoryId' => '01942cf46b90719b958f9803433cf434',
                                        'name' => $this->translationHelper->adjustTranslations([
                                            'zh-CN' => '加入我们',
                                            'en-GB' => 'Join Us',
                                        ]),
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'id' => '01942cf93310710d9faf4a4d76e05a9c',
                        'cmsPageId' => $cmsPageId,
                        'active' => true,
                        'displayNestedProducts' => true,
                        'visible' => false,
                        'type' => 'page',
                        'afterCategoryId' => '01942ce041de71cfbb175364b166dd4d',
                        'name' => $this->translationHelper->adjustTranslations([
                            'zh-CN' => '页脚服务导航',
                            'en-GB' => 'Footer service navigation',
                        ]),
                        'serviceSalesChannels' => [
                            [
                                'id' => $this->dbHelper->getStorefrontSalesChannel(),
                            ],
                        ],
                        'children' => [
                            [
                                'id' => '01942cf99e0e713ea31d4fdfe5b385bd',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '条款与条件',
                                    'en-GB' => 'Terms & Conditions',
                                ]),
                            ],
                            [
                                'id' => '01942cfb468c735293b76d34314c909e',
                                'cmsPageId' => $cmsPageId,
                                'active' => true,
                                'displayNestedProducts' => true,
                                'visible' => true,
                                'type' => 'page',
                                'afterCategoryId' => '01942cf99e0e713ea31d4fdfe5b385bd',
                                'name' => $this->translationHelper->adjustTranslations([
                                    'zh-CN' => '隐私协议',
                                    'en-GB' => 'Privacy',
                                ]),
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    private function getRootCategoryId(): string
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('parentId', null));

        $rootCategory = $this->categoryRepository->search($criteria, new Context(new SystemSource()))->getEntities()->first();
        if (!$rootCategory) {
            throw new \RuntimeException('Root category not found');
        }

        return $rootCategory->getId();
    }

    private function getDefaultCmsListingPageId(): string
    {
        $id = $this->getCmsPageIdByName('Default listing layout');

        if ($id !== null) {
            return $id;
        }

        // BC support for older shopware versions - \Shopware\Core\Migration\V6_4\Migration1645019769UpdateCmsPageTranslation changed the translations
        $id = $this->getCmsPageIdByName('Default category layout');

        if ($id !== null) {
            return $id;
        }

        throw new \RuntimeException('Default Cms Listing page not found');
    }

    private function getCmsPageIdByName(string $name): ?string
    {
        $id = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(cms_page_id)) as cms_page_id
                FROM cms_page_translation
                INNER JOIN cms_page ON cms_page.id = cms_page_translation.cms_page_id
                WHERE cms_page.locked
                AND name = :name
            ',
            ['name' => $name]
        );

        return $id !== false ? $id : null;
    }
}
