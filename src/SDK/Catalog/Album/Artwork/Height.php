<?php
declare(strict_types = 1);

namespace MusicCompanion\AppleMusic\SDK\Catalog\Album\Artwork;

use MusicCompanion\AppleMusic\Exception\DomainException;

final class Height
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new DomainException((string) $value);
        }

        $this->value = $value;
    }

    public function toInt(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
