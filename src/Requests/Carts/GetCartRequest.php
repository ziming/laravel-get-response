<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Carts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get cart by ID
 *
 * GET /shops/{shopId}/carts/{cartId}
 */
class GetCartRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $cartId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/carts/'.$this->cartId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
