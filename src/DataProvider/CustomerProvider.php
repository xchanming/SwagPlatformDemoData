<?php

declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PlatformDemoData\DataProvider;

use Doctrine\DBAL\Connection;
use Shopware\Core\Checkout\Customer\CustomerEntity;
use Shopware\Core\Content\Category\CategoryCollection;
use Shopware\Core\Framework\Api\Context\SystemSource;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Test\TestDefaults;
use Swag\PlatformDemoData\Resources\helper\DbHelper;

#[Package('fundamentals@after-sales')]
class CustomerProvider extends DemoDataProvider
{
    private Connection $connection;

    /**
     * @var EntityRepository<CategoryCollection>
     */
    private EntityRepository $categoryRepository;

    private DbHelper $dbHelper;

    /**
     * @param EntityRepository<CategoryCollection> $categoryRepository
     */
    public function __construct(Connection $connection, EntityRepository $categoryRepository)
    {
        $this->connection = $connection;
        $this->categoryRepository = $categoryRepository;
        $this->dbHelper = new DbHelper($connection);
    }

    public function getAction(): string
    {
        return 'upsert';
    }

    public function getEntity(): string
    {
        return 'customer';
    }

    public function getPayload(): array
    {
        $salutationId = $this->getSalutationId();
        $countryId = $this->getCountryId();
        $salesChannelId = $this->getStorefrontSalesChannelId();

        return [
            [
                'id' => '6c97534c2c0747f39e8751e43cb2b013',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1000200000022',
                'title' => '清风徐来',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'test@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2019-06-12 07:13:39.641',
                'birthday' => '20001-06-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
                'defaultShippingAddress' => [
                    'id' => 'd8f0dff7ef3947979a83c42f6509f22c',
                    'countryId' => $countryId,
                    'countryStateId' => $this->dbHelper->getCountryStateId(),
                    'city' => '成都市',
                    'phoneNumber' => '12345678',
                    'salutationId' => $salutationId,
                    'name' => 'Admin',
                    'street' => '北京市长安街1号',
                    'zipcode' => '12345',
                ],
                'defaultBillingAddressId' => 'd8f0dff7ef3947979a83c42f6509f22c',
            ],
            [
                'id' => '01942639f4c1705eb9e4435201085e5c',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1000000000000',
                'title' => '商户A',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'test1@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2019-06-12 07:13:39.641',
                'birthday' => '1996-06-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0195afae9ece719a83b54501b9e7c869',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1020000000000',
                'title' => '商户B',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'test2@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2019-06-12 07:13:39.641',
                'birthday' => '1996-06-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194263c92f87165ba7962520d9cfd67',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1020030000000',
                'title' => '量子行者⚛️',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'shop@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2024-06-12 07:13:39.641',
                'birthday' => '2024-06-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194263fa2da724fafe14289d08433b1',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1020030010000',
                'title' => '54程序员',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'zhangsan@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2024-01-01 07:13:39.641',
                'birthday' => '2024-06-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264134f77294ad989649a0613399',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1020030010006',
                'title' => '冰封王座❄️',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'lisi@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2024-01-01 07:13:39.641',
                'birthday' => '2024-01-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '019426418d3f720dab671c79d72c77cf',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1020030010050',
                'username' => 'wangwu',
                'title' => 'wangwu',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'wangwu@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-01 07:13:39.641',
                'birthday' => '2024-01-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942641d96c70329eee9b96f6fb4294',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1020030410000',
                'username' => 'vip',
                'title' => 'vip',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'vip@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2022-01-01 07:13:39.641',
                'birthday' => '2024-01-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942643377673f2bce33486242b5d14',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1021030110000',
                'username' => 'nick',
                'title' => 'nick',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'nick@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-01 07:13:39.641',
                'birthday' => '2024-01-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '019426438903724881be59e1386cda3b',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1020030010001',
                'username' => 'wangwang',
                'title' => 'wangwang',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'wangwang@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-01 07:13:39.641',
                'birthday' => '2024-01-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942644dbc9729985fb93033e93dd34',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1020030010000',
                'username' => 'cicada',
                'title' => 'cicada',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'cicada@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264659fa738b9bef510201faed76',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134030010000',
                'username' => 'php',
                'title' => 'php',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'php@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942647c7f4722fa402b7c351a2407f',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010090',
                'username' => 'tests',
                'title' => 'tests',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'tests@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264833fb7138ad17db0597ea600c',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010091',
                'username' => 'role',
                'title' => 'role',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'role@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '019426488f56702bb6327b700dbaed9a',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010092',
                'username' => 'role',
                'title' => 'role',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'role@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942648c578707eab811b4c63ed83e4',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010093',
                'username' => 'swag',
                'title' => 'swag',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'swag@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '019426490ead73f7b19cfaebcca2cc1e',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010094',
                'username' => 'resources',
                'title' => 'resources',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'resources@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264956717143896db0ba03a906b5',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010095',
                'username' => 'date',
                'title' => 'date',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'date@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942649a40f71dc92fbbd3eb92959c2',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010095',
                'username' => 'data',
                'title' => 'data',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'data@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942649e7827309a045da7f052c6f6c',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010096',
                'username' => 'git',
                'title' => 'git',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'git@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264a35b571148f9ef17d86254625',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010097',
                'username' => 'public',
                'title' => 'public',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'public@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264a931371aebaa155747575cbad',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010098',
                'username' => 'admin1234',
                'title' => 'admin1234',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'admin1234@test.com',
                'active' => true,
                'group' => [
                    'id' => '0194265f889071d99507a9cc6b09b92f',
                ],
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264af04371a29911b061f2ba07d4',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010099',
                'username' => 'test1234',
                'title' => 'test1234',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'test1234@test.com',
                'active' => true,
                'group' => [
                    'id' => '0194265f62517068a03a07f37a1580b7',
                ],
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264b47ba728da6de96c17e53df82',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010100',
                'username' => 'demo1234',
                'title' => 'demo1234',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'demo1234@test.com',
                'active' => true,
                'guest' => false,
                'group' => [
                    'id' => '0194265fbcac71f7bd3f7ff0e50ddc92',
                ],
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264b92f073ce8e7a1865cf9143da',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010101',
                'username' => 'user1234',
                'title' => 'user1234',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'user1234@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264be2a471b6948ab0f5366e7555',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010102',
                'username' => 'user6666',
                'title' => 'user6666',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'user6666@test.com',
                'active' => true,
                'group' => [
                    'id' => '0194266044b9706a8467c81a3ca36b60',
                ],
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264c381a72a7b3569ade171af126',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010103',
                'username' => 'user7777',
                'accountType' => CustomerEntity::ACCOUNT_TYPE_BUSINESS,
                'title' => 'user7777',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'user7777@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264c7c7970d4ada7cdf2f9349f4e',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010104',
                'username' => 'admin1111',
                'title' => 'admin1111',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'admin1111@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264cd1dd71fe9cc55b7fbffaf43b',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010105',
                'username' => 'admin2222',
                'accountType' => CustomerEntity::ACCOUNT_TYPE_BUSINESS,
                'title' => 'admin2222',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'admin2222@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264d0f0b735e913014a8f95583d9',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010106',
                'username' => 'admin3333',
                'title' => 'admin3333',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'admin3333@test.com',
                'active' => true,
                'guest' => false,
                'accountType' => CustomerEntity::ACCOUNT_TYPE_BUSINESS,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264d49ee70eea65b20aa73a9c16a',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010107',
                'username' => 'admin4444',
                'title' => 'admin4444',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'admin4444@test.com',
                'active' => false,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264d8eb1702c93f3d042a8f045e4',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010108',
                'username' => 'admin6666',
                'title' => 'admin6666',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'admin6666@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264e0ff273a0b97c218e16f598f1',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010109',
                'username' => 'admin8888',
                'title' => 'admin8888',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'admin8888@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264e503b7135b698f1e870258b74',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010110',
                'username' => 'admin9999',
                'title' => 'admin9999',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'admin9999@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264ea2757062b782cc1b43140963',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010111',
                'username' => 'test6666',
                'title' => 'test6666',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'test6666@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264ef0ed736696a45777a05c9cdd',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010112',
                'username' => 'test8888',
                'title' => 'test8888',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'test8888@test.com',
                'active' => false,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264f2ff37266854464155d727433',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010112',
                'username' => 'test9999',
                'title' => 'test9999',
                'group' => [
                    'id' => '0194265fbcac71f7bd3f7ff0e50ddc92',
                ],
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'test9999@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264f8f2072e6ad73f3078c820143',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010113',
                'username' => 'demo6666',
                'title' => 'demo6666',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'demo6666@test.com',
                'accountType' => CustomerEntity::ACCOUNT_TYPE_BUSINESS,
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '0194264fcceb730f876a7028378f6a74',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010114',
                'username' => 'demo8888',
                'group' => [
                    'id' => '0194265f62517068a03a07f37a1580b7',
                ],
                'title' => 'demo8888',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'demo8888@test.com',
                'active' => true,
                'accountType' => CustomerEntity::ACCOUNT_TYPE_BUSINESS,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942650159773f8963abb8256527538',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010115',
                'username' => 'demo9999',
                'title' => 'demo9999',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'demo9999@test.com',
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
            [
                'id' => '01942653b9a273a6b9f2058258d2f63c',
                'salutationId' => $salutationId,
                'salesChannelId' => $salesChannelId,
                'customerNumber' => '1134930010116',
                'title' => '👍古方',
                'password' => TestDefaults::HASHED_PASSWORD,
                'email' => 'demo1000@test.com',
                'group' => [
                    'id' => '0194266044b9706a8467c81a3ca36b60',
                ],
                'active' => true,
                'guest' => false,
                'newsletter' => false,
                'lastLogin' => '2023-01-05 07:13:39.641',
                'birthday' => '2024-03-06',
                'groupId' => 'cfbd5018d38d41d8adca10d94fc8bdd6',
            ],
        ];
    }

    private function getSalutationId(): string
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

    private function getCountryId(): string
    {
        $result = $this->connection->fetchOne('
            SELECT LOWER(HEX(`id`))
            FROM `country`
            WHERE `active` = 1 and `iso3`="CHN";
        ');

        if (!$result) {
            throw new \RuntimeException('No active payment method found, please make sure that basic data is available by running the migrations.');
        }

        return (string) $result;
    }

    private function getStorefrontSalesChannelId(): string
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('parentId', null));
        $criteria->addAssociation('navigationSalesChannels');

        $rootCategory = $this->categoryRepository->search($criteria, new Context(new SystemSource()))->getEntities()->first();
        if (!$rootCategory) {
            throw new \RuntimeException('Root category not found');
        }

        $navigationSalesChannels = $rootCategory->getNavigationSalesChannels();
        if ($navigationSalesChannels === null) {
            throw new \RuntimeException('Sales channel not found');
        }

        $navigationSalesChannel = $navigationSalesChannels->first();
        if (!$navigationSalesChannel) {
            throw new \RuntimeException('Sales channel not found');
        }

        return $navigationSalesChannel->getId();
    }
}
