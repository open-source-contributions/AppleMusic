<?php
declare(strict_types = 1);

namespace MusicCompanion\AppleMusic\SDK\Library\Artist;

use MusicCompanion\AppleMusic\Exception\DomainException;
use Innmind\Immutable\Str;

final class Id
{
    private $value;

    public function __construct(string $value)
    {
        if (!Str::of($value)->matches('~^r\.[a-zA-Z0-9]{7}$~')) {
            throw new DomainException($value);
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}