<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\LandingPages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the list of landing pages
 *
 * GET /lps
 */
class GetLpsListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
        protected readonly array $sortParameters = [],
        protected readonly array $stats = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/lps';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'sort' => $this->sortParameters,
            'stats' => $this->stats,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
