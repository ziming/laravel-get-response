<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Websites;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetLandingPageByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $landingPageId, protected readonly array $fields = []) {}

    protected function defaultQuery(): array
    {
        return [
            'fields' => implode(',', $this->fields),
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/landing-pages/'.$this->landingPageId;
    }
}
