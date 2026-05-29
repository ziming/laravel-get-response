<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Carts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get shop carts
 *
 * GET /shops/{shopId}/carts
 */
class GetCartsRequest extends Request
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
        return '/shops/'.$this->shopId.'/carts';
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
