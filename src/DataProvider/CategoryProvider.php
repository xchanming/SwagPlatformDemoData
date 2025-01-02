<?php

declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PlatformDemoData\DataProvider;

use Doctrine\DBAL\Connection;
use Cicada\Core\Content\Category\CategoryCollection;
use Cicada\Core\Content\Category\CategoryEntity;
use Cicada\Core\Framework\Api\Context\SystemSource;
use Cicada\Core\Framework\Context;
use Cicada\Core\Framework\DataAbstractionLayer\EntityRepository;
use Cicada\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Cicada\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Cicada\Core\Framework\Log\Package;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

#[Package('services-settings')]
class CategoryProvider extends DemoDataProvider
{
    /**
     * @var EntityRepository<CategoryCollection>
     */
    private EntityRepository $categoryRepository;

    private Connection $connection;

    private TranslationHelper $translationHelper;

    /**
     * @param EntityRepository<CategoryCollection> $categoryRepository
     */
    public function __construct(EntityRepository $categoryRepository, Connection $connection)
    {
        $this->categoryRepository = $categoryRepository;
        $this->connection = $connection;
        $this->translationHelper = new TranslationHelper($connection);
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
                    'zh-CN' => '蝉鸣平台游戏商城演示系统',
                    'en-GB' => 'Cicada Chirping Platform Game Store Demo System'
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
                                    'zh-CN' => '电子商务',
                                    'en-GB' => 'E-Commerce',
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
                                    'zh-CN' => '企业门户',
                                    'en-GB' => 'Business',
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

        // BC support for older shopware versions - \Cicada\Core\Migration\V6_4\Migration1645019769UpdateCmsPageTranslation changed the translations
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
