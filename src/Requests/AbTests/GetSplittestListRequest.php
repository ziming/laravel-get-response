<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\AbTests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The list of A/B tests.
 *
 * GET /splittests
 */
class GetSplittestListRequest extends Request
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
        return '/splittests';
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
