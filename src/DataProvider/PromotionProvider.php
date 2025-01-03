<?php declare(strict_types=1);

namespace Swag\PlatformDemoData\DataProvider;

use Cicada\Core\Framework\Log\Package;
use Doctrine\DBAL\Connection;
use Swag\PlatformDemoData\Resources\helper\DbHelper;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

#[Package('services-settings')]
class PromotionProvider extends DemoDataProvider
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
        return 'promotion';
    }

    public function getPayload(): array
    {
        return [
            [
                'id' => '01942d4fa1d57397aca1a47ad887f401',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => '促销-1',
                    'en-GB' => 'promotion',
                ]),
                'active' => true,
                'useSetGroups' => false,
                'salesChannels' => $this->dbHelper->getStorefrontSalesChannel(),
                'code' => '10000000000',
                'useCodes' => true,
            ],
        ];
    }
}
