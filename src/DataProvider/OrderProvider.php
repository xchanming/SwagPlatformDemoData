<?php declare(strict_types=1);

namespace Swag\PlatformDemoData\DataProvider;

use Cicada\Core\Framework\Log\Package;
use Doctrine\DBAL\Connection;
use Swag\PlatformDemoData\Resources\helper\DbHelper;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

#[Package('services-settings')]
class OrderProvider extends DemoDataProvider
{
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
        return 'order';
    }

    public function getPayload(): array
    {
        return [

        ];
    }
}
