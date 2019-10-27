<?php
declare(strict_types = 1);

namespace Fixtures\MusicCompanion\AppleMusic\SDK\Catalog\Album;

use MusicCompanion\AppleMusic\SDK\Catalog\Album\EditorialNotes as Model;
use Innmind\BlackBox\Set;

final class EditorialNotes
{
    /**
     * @return Set<Model>
     */
    public static function any(): Set
    {
        return new Set\Composite(
            static function($standard, $short): Model {
                return new Model($standard, $short);
            },
            new Set\Strings,
            new Set\Strings
        );
    }
}
