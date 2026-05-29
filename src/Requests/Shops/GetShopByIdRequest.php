<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Shops;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single shop by ID
 *
 * GET /shops/{shopId}
 */
class GetShopByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
