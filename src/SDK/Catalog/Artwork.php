<?php
declare(strict_types = 1);

namespace MusicCompanion\AppleMusic\SDK\Catalog;

use MusicCompanion\AppleMusic\SDK\Catalog\Artwork\{
    Width,
    Height,
};
use Innmind\Url\{
    Url,
    Path,
};
use Innmind\Colour\RGBA;
use Innmind\Immutable\Str;

final class Artwork
{
    private Width $width;
    private Height $height;
    private Url $url;
    private ?RGBA $backgroundColor;
    private ?RGBA $textColor1;
    private ?RGBA $textColor2;
    private ?RGBA $textColor3;
    private ?RGBA $textColor4;

    public function __construct(
        Width $width,
        Height $height,
        Url $url,
        ?RGBA $backgroundColor,
        ?RGBA $textColor1,
        ?RGBA $textColor2,
        ?RGBA $textColor3,
        ?RGBA $textColor4
    ) {
        $this->width = $width;
        $this->height = $height;
        $this->url = $url;
        $this->backgroundColor = $backgroundColor;
        $this->textColor1 = $textColor1;
        $this->textColor2 = $textColor2;
        $this->textColor3 = $textColor3;
        $this->textColor4 = $textColor4;
    }

    public function width(): Width
    {
        return $this->width;
    }

    public function height(): Height
    {
        return $this->height;
    }

    public function url(): Url
    {
        return $this->url;
    }

    public function backgroundColor(): ?RGBA
    {
        return $this->backgroundColor;
    }

    public function textColor1(): ?RGBA
    {
        return $this->textColor1;
    }

    public function textColor2(): ?RGBA
    {
        return $this->textColor2;
    }

    public function textColor3(): ?RGBA
    {
        return $this->textColor3;
    }

    public function textColor4(): ?RGBA
    {
        return $this->textColor4;
    }

    public function ofSize(Width $width, Height $height): Url
    {
        $path = Str::of($this->url->path()->toString())
            ->replace('{w}', $width->toString())
            ->replace('{h}', $height->toString())
            ->toString();

        return $this->url->withPath(Path::of($path));
    }
}
