<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a list of custom fields
 *
 * GET /custom-fields
 */
class GetCustomFieldListRequest extends Request
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
        return '/custom-fields';
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
