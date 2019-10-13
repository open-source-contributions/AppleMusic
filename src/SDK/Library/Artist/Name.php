<?php
declare(strict_types = 1);

namespace MusicCompanion\AppleMusic\SDK\Library\Artist;

final class Name
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}