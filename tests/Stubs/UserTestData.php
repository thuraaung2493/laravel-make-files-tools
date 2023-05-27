<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Tests\Stubs;

use Thuraaung\MakeFiles\Contracts\DataObjectContract;

final readonly class UserTestData implements DataObjectContract
{
    public function __construct(
        public string $name
    ) {
    }

    public static function of(array $attributes): UserTestData
    {
        return new UserTestData(
            name: 'Test',
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
