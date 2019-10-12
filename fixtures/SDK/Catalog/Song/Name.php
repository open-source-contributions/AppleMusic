<?php
declare(strict_types = 1);

namespace Fixtures\MusicCompanion\AppleMusic\SDK\Catalog\Song;

use MusicCompanion\AppleMusic\SDK\Catalog\Song\Name as Model;
use Innmind\BlackBox\Set;

final class Name
{
    /**
     * @return Set<Model>
     */
    public static function any(): Set
    {
        return new Set\Decorate(
            static function(string $string): Model {
                return new Model($string);
            },
            new Set\Strings
        );
    }
}
