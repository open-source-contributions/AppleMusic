<?php
declare(strict_types = 1);

namespace MusicCompanion\AppleMusic\SDK;

use Innmind\HttpTransport\Transport;
use Innmind\Http\{
    Header\Authorization,
    Message\Request\Request,
    Message\Method,
    ProtocolVersion,
    Headers,
};
use Innmind\Url\Url;
use Innmind\Json\Json;
use Innmind\Immutable\Set;

final class Storefronts
{
    private Transport $fulfill;
    private Authorization $authorization;

    public function __construct(Transport $fulfill, Authorization $authorization)
    {
        $this->fulfill = $fulfill;
        $this->authorization = $authorization;
    }

    /**
     * @return Set<Storefront>
     */
    public function all(): Set
    {
        $response = ($this->fulfill)(new Request(
            Url::of('/v1/storefronts'),
            Method::get(),
            new ProtocolVersion(2, 0),
            Headers::of(
                $this->authorization
            )
        ));

        /** @var array{data: list<array{id: string, attributes: array{name: string, defaultLanguageTag: string, supportedLanguageTags: list<string>}}>} */
        $resource = Json::decode($response->body()->toString());
        /** @var Set<Storefront> */
        $storefronts = Set::of(Storefront::class);

        foreach ($resource['data'] as $storefront) {
            $storefronts = $storefronts->add(new Storefront(
                new Storefront\Id($storefront['id']),
                new Storefront\Name($storefront['attributes']['name']),
                new Storefront\Language($storefront['attributes']['defaultLanguageTag']),
                ...\array_map(
                    static function(string $language): Storefront\Language {
                        return new Storefront\Language($language);
                    },
                    $storefront['attributes']['supportedLanguageTags']
                )
            ));
        }

        return $storefronts;
    }
}
