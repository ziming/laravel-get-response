<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\MetaFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the shop meta fields
 *
 * GET /shops/{shopId}/meta-fields
 */
class GetMetaFieldsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly array $queryParameters = [],
        protected readonly array $sortParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/meta-fields';
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
