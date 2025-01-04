<?php declare(strict_types=1);

namespace Swag\PlatformDemoData\DataProvider;

use Cicada\Core\Framework\Log\Package;
use Doctrine\DBAL\Connection;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

#[Package('services-settings')]
class ManufacturerProvider extends DemoDataProvider
{
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
        return 'product_manufacturer';
    }

    public function getPayload(): array
    {
        return [
            [
                'id' => '01942d007c6a7277a2a058fa0b90322a',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => '官方制作',
                    'en-GB' => 'Cicada',
                ]),
            ],
            [
                'id' => '7f24e96676e944b0a0addc20d56728cb',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Cicada Software',
                    'en-GB' => 'Cicada Software',
                ]),
            ],
            [
                'id' => '2326d67406134c88bcf80e52d9d2ecb7',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Cicada Theme',
                    'en-GB' => 'Cicada Theme',
                ]),
            ],
            [
                'id' => 'cc1c20c365d34cfb88bfab3c3e81d350',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'Cicada Plus',
                    'en-GB' => 'Cicada Plus',
                ]),
            ],
        ];
    }
}
