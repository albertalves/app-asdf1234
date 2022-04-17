<?php

namespace App\Enum;

final class ActionType
{
    public const INITIAL = 0;
    public const ADDED = 1;
    public const REMOVED = 2;

    public static function values(): array
    {
        return [
            self::INITIAL => [ 
                'id' => self::INITIAL, 
                'title' => 'Quantidade inicial'
            ],
            self::ADDED => [ 
                'id' => self::ADDED, 
                'title' => 'Quantidade adicionada'
            ],
            self::REMOVED => [ 
                'id' => self::REMOVED, 
                'title' => 'Quantidade removida'
            ],
        ];
    }

    public static function get(?int $id): ?array
    {
        return self::values()[$id] ?? null;
    }
}
