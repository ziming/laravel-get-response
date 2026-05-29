<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\LandingPages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single landing page by ID
 *
 * GET /lps/{lpsId}
 */
class GetLpsByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $lpsId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/lps/'.$this->lpsId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
