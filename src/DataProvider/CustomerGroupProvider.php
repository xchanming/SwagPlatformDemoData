<?php declare(strict_types=1);

namespace Swag\PlatformDemoData\DataProvider;

use Doctrine\DBAL\Connection;
use Swag\PlatformDemoData\Resources\helper\TranslationHelper;

class CustomerGroupProvider extends DemoDataProvider
{
    private TranslationHelper $translationHelper;

    public function __construct(
        private readonly Connection $connection
    ) {
        $this->translationHelper = new TranslationHelper($connection);
    }

    public function getAction(): string
    {
        return 'upsert';
    }

    public function getEntity(): string
    {
        return 'customer_group';
    }

    public function getPayload(): array
    {
        return [
            [
                'id' => '0194265f62517068a03a07f37a1580b7',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => 'VIP 客户组',
                    'en-GB' => 'VIP customers group',
                ]),
            ],
            [
                'id' => '0194265f889071d99507a9cc6b09b92f',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => '新客户组',
                    'en-GB' => 'New customers group',
                ]),
            ],
            [
                'id' => '0194265fbcac71f7bd3f7ff0e50ddc92',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => '测试客户组',
                    'en-GB' => 'Testing customers group',
                ]),
            ],
            [
                'id' => '0194266044b9706a8467c81a3ca36b60',
                'name' => $this->translationHelper->adjustTranslations([
                    'zh-CN' => '积分会员客户组',
                    'en-GB' => 'Loyalty Program Members',
                ]),
            ],
        ];
    }
}
