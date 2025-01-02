<?php declare(strict_types=1);

namespace Swag\PlatformDemoData\DataProvider;

use Cicada\Core\Framework\Util\Hasher;
use Doctrine\DBAL\Connection;
use Swag\PlatformDemoData\Resources\helper\DbHelper;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

class NewsletterRecipientProvider extends DemoDataProvider
{
    private TranslationHelper $translationHelper;

    private DbHelper $dbHelper;

    public function __construct(
        private readonly Connection $connection
    ) {
        $this->translationHelper = new TranslationHelper($connection);
        $this->dbHelper = new DbHelper($connection);
    }

    public function getAction(): string
    {
        return 'upsert';
    }

    public function getEntity(): string
    {
        return 'newsletter_recipient';
    }

    public function getPayload(): array
    {
        return [
            [
                'id' => '0194269d0dc271eea44ece5a66134c1e',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('user1234@test.com', 'sha1'),
                'hash' => '0194269d0dc271eea44ece5a66134c1e',
                'email' => 'user1234@test.com',
                'name' => 'user1234',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '0194269cb7e470ec80ded1e0fcabd59c',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('user6666@test.com', 'sha1'),
                'hash' => '0194269cb7e470ec80ded1e0fcabd59c',
                'email' => 'user6666@test.com',
                'name' => 'user6666',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '0194269c723a73c2b205f9350242e619',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('user7777@test.com', 'sha1'),
                'hash' => '0194269c723a73c2b205f9350242e619',
                'email' => 'user7777@test.com',
                'name' => 'user7777',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '0194269c31c572949c706f258e89dc81',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('admin1111@test.com', 'sha1'),
                'hash' => '0194269c31c572949c706f258e89dc81',
                'email' => 'admin1111@test.com',
                'name' => 'admin1111',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '0194269bec0c738288f72d1ce3d092cd',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('admin2222@test.com', 'sha1'),
                'hash' => '0194269bec0c738288f72d1ce3d092cd',
                'email' => 'admin2222@test.com',
                'name' => 'admin2222',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '0194269802c67184ac81361ee4652d57',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('admin3333@test.com', 'sha1'),
                'hash' => 'b4b45f58088d41289490db956ca19af7',
                'email' => 'admin3333@test.com',
                'name' => 'admin3333',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '01942697c4a070d0af72079a37c34087',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('admin4444@test.com', 'sha1'),
                'hash' => '01942698ccf6717184a2920b3024673b',
                'email' => 'admin4444@test.com',
                'name' => 'admin4444',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '0194269789ff73afbc5530f972b962c0',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('admin6666@test.com', 'sha1'),
                'hash' => '019426991c87716a8330227ee7a4a35f',
                'email' => 'admin6666@test.com',
                'name' => 'admin6666',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '019426973f70722ab346f7c71412e339',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('admin8888@test.com', 'sha1'),
                'hash' => '019426993ffd7070b91db459424c52d4',
                'email' => 'admin8888@test.com',
                'name' => 'admin8888',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '01942696ff8b72ef8029539c657c1bad',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('admin9999@test.com', 'sha1'),
                'hash' => '0194269955c47271b9f07a2167ca76bb',
                'email' => 'admin9999@test.com',
                'name' => 'admin9999',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '01942696c3eb705cb067978d33cf4640',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('test6666@test.com', 'sha1'),
                'hash' => 'b4b45f58088d41389490db956ca19af7',
                'email' => 'test6666@test.com',
                'name' => 'test6666',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '01942696a54d700f9b5cbb769925ca8f',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('test8888@test.com', 'sha1'),
                'hash' => 'b4b45f58088d42289490db956ca19af7',
                'email' => 'test8888@test.com',
                'name' => 'test8888',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '019426962e9370f6952067dc8d638272',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('demo6666@test.com', 'sha1'),
                'hash' => 'b4b45f58088d41289590db956ca19af7',
                'email' => 'test9999@test.com',
                'name' => 'test9999',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '019426876b9370e6a760109dd0b2375c',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('test@test.com', 'sha1'),
                'hash' => 'b4b45f58088d41289490db956ca10af7',
                'email' => 'test@test.com',
                'name' => 'test',
                'status' => 'direct',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '01942693d3627328817dbc7539b146d1',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('demo1000@test.com', 'sha1'),
                'hash' => 'b4c45f58088d41289490db956ca19af7',
                'email' => 'demo1000@test.com',
                'name' => 'demo1000',
                'status' => 'notSet',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '019426948bd27391bf807783eb31f75e',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('demo9999@test.com', 'sha1'),
                'hash' => 'b4b45f58088d41289490db956ba19af7',
                'email' => 'demo9999@test.com',
                'name' => 'demo9999',
                'status' => 'optIn',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '019426953f2f71579c4e317400471821',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('demo8888@test.com', 'sha1'),
                'hash' => 'b4b45f58088d41289490db956ca29af7',
                'email' => 'demo8888@test.com',
                'updatedAt' => new \DateTime(),
                'name' => 'demo8888',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
            [
                'id' => '01942695d30a72399be448c1eab701e6',
                'confirmedAt' => new \DateTime(),
                'em' => Hasher::hash('demo6666@test.com', 'sha1'),
                'hash' => 'b4b45f58088d41289490db956ca19af8',
                'email' => 'demo6666@test.com',
                'name' => 'demo6666',
                'status' => 'optOut',
                'salesChannelId' => $this->dbHelper->getStorefrontSalesChannel(),
            ],
        ];
    }
}
