<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\LegacyLandingPages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get single landing page by ID
 *
 * GET /landing-pages/{landingPageId}
 */
class GetLandingPageByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $landingPageId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/landing-pages/'.$this->landingPageId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
