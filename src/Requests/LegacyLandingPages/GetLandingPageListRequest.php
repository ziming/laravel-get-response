<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\LegacyLandingPages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a list of landing pages
 *
 * GET /landing-pages
 */
class GetLandingPageListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
        protected readonly array $sortParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/landing-pages';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'sort' => $this->sortParameters,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
